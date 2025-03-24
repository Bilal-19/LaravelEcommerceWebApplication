<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{

    // Display all categories to Admin Panel
    public function viewCategories()
    {
        $category = Category::all();
        return view('admin.category')->with(compact('category'));
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'category' => 'required'
        ]);

        // Check if the provided value of 'category' already exist
        $isCategoryAlreadyExist = Category::where('category_name', $request->category)->count();

        if ($isCategoryAlreadyExist > 0) {
            toastr()
                ->timeOut(5000)
                ->closeButton()
                ->addWarning('The provided category is already exist in our database');
                return redirect()->back();
        } else {

            $category = new Category();
            $category->category_name = $request->category;
            $result = $category->save();

            // Show notification to the user for 5 seconds
            if ($result) {
                toastr()
                    ->timeOut(5000)
                    ->closeButton()
                    ->addSuccess('New Category Added Successfully');
                return redirect('/admin/dashboard/category');
            } else {
                toastr()
                    ->timeOut(5000)
                    ->closeButton()
                    ->addWarning('Failed to add new category');
            }
        }

    }

    public function deleteCategory($id)
    {
        $findCategory = Category::find($id);
        $result = $findCategory->delete();
        if ($result) {
            toastr()
                ->timeOut(5000)
                ->closeButton()
                ->addSuccess('Category deleted successfully');
        }
        return redirect()->back();
    }

    public function editCategory($id)
    {
        $findCategory = Category::find($id);
        return view("admin.EditCategory")->with(compact('findCategory'));
    }
    public function updateCategory($id, Request $request)
    {
        $request->validate(
            [
                'category' => 'required'
            ]
        );
        $findCategory = Category::find($id);
        $findCategory->category_name = $request->category;
        $result = $findCategory->save();
        if ($result) {
            toastr()
                ->timeOut(5000)
                ->closeButton()
                ->addSuccess('Data updated successfully');
        }
        return redirect('/admin/dashboard/category');
    }

    public function viewAddProductForm()
    {
        $allCategories = Category::all();
        return view("admin.AddProduct")->with(compact('allCategories'));
    }

    public function storeProductToDatabase(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'category' => 'required',
            'quantity' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->image = $imageName;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;


        // Save Image to public folder
        $request->image->move('products', $imageName);

        // Store image to database
        $result = $product->save();

        if ($result) {
            toastr()->timeOut(2000)->closeButton()->addSuccess('Product added successfully');
            return redirect('/admin/add/product');
        }
    }

    public function viewProducts(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search) {
            $products = Product::
                where('title', 'LIKE', $search)
                ->orWhere('price', 'LIKE', $search)
                ->orWhere('category', 'LIKE', $search)
                ->paginate(3);
            return view('admin.ViewProduct')->with(compact('products'));
        } else {
            $products = Product::all();
            return view('admin.ViewProduct')->with(compact('products'));
        }
    }

    public function deleteProduct($id)
    {
        $findProduct = Product::find($id);

        // Delete Image from Public folder
        $image_path = public_path('products/' . $findProduct->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $res = $findProduct->delete();
        if ($res) {
            toastr()
                ->timeOut(100000)
                ->closeButton()
                ->addSuccess('Product deleted successfully');
            return redirect('/admin/view/products');
        } else {
            return redirect('/admin/view/products');
        }
    }

    public function editProduct($id)
    {
        $findProduct = Product::find($id);
        $allCategories = Category::all();
        return view("admin.EditProduct")->with(compact('findProduct', 'allCategories'));
    }

    public function storeUpdatedProductToDatabase($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'category' => 'required',
            'quantity' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();

        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->image = $imageName;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        // Save Image to public folder
        $request->image->move('products', $imageName);

        // Store image to database
        $result = $product->save();

        if ($result) {
            toastr()->timeOut(2000)->closeButton()->addSuccess('Product updated successfully');
            return redirect('/admin/view/products');
        }
    }

    public function LogOut()
    {
        Auth::logout();
        return redirect('/');
    }

    public function viewOrders()
    {
        $orders = Order::all();
        return view("admin.ViewOrder")->with(compact('orders'));
    }

    public function updateOrderStatus($id)
    {
        $findOrder = Order::find($id);
        if ($findOrder->status == "in progress") {
            $findOrder->status = 'On the way';
            $findOrder->save();
            toastr()->timeOut(2000)->closeButton()->addSuccess('Order status updated successfully');
            return redirect()->back();
        } else if ($findOrder->status == 'On the way') {
            $findOrder->status = 'Delivered';
            $findOrder->save();
            toastr()->timeOut(2000)->closeButton()->addSuccess('Order status updated successfully');
            return redirect()->back();
        }
    }

    public function printPDF($id)
    {
        $findOrder = Order::find($id);
        $pdf = Pdf::loadView('admin.Invoice', compact('findOrder'));
        return $pdf->download('invoice.pdf');
    }

    public function customerInquiries()
    {
        $allInquiries = ContactUs::all();
        return view('admin.CustomerQueries')->with(compact('allInquiries'));
    }
}



