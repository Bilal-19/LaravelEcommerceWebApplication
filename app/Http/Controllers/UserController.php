<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getCartCount()
    {
        if (Auth::user()) {
            $count = Cart::all()->where('user_id', Auth::user()->id)->count();
            return $count;
        } else {
            $count = 0;
            return $count;
        }
    }
    public function index()
    {
        $products = Product::all();
        $count = $this->getCartCount();
        return view("user.index")->with(compact('products', 'count'));
    }

    public function viewSpecificProduct($id)
    {
        $findProduct = Product::find($id);
        $count = $this->getCartCount();
        return view("user.DetailedProduct")->with(compact('findProduct', 'count'));
    }

    public function addToCart($id)
    {
        if (Auth::check()) {
            $getUserId = Auth::user()->id;
            $checkCondition = Cart::
                where('product_id', '=', $id)
                ->where('user_id', '=', Auth::user()->id)
                ->first();
            if ($checkCondition) {
                $checkCondition->product_quantity += 1;
                $checkCondition->save();
                toastr()
                    ->timeOut(5000)
                    ->closeButton()
                    ->addSuccess('Product Updated to the Cart Successfully');
                return redirect()->back();
            } else {
                $cartData = new Cart();
                $cartData->product_id = $id;
                $cartData->user_id = $getUserId;
                $cartData->product_quantity = 1;
                $result = $cartData->save();
                toastr()
                    ->timeOut(5000)
                    ->closeButton()
                    ->addSuccess('Product Added to the Cart Successfully');
                return redirect()->back();

            }
        } else {
            return redirect('/login');
        }



    }

    public function viewCart()
    {
        if (Auth::check()) {
            $count = $this->getCartCount();
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            return view('user.ViewCart')->with(compact('count', 'cart'));
        } else {
            return redirect('/login');
        }
    }

    // Function to delete product from cart
    public function deleteFromCart($id)
    {
        $findCartValue = Cart::find($id);
        $res = $findCartValue->delete();
        if ($res) {
            toastr()
                ->timeOut(5000)
                ->closeButton()
                ->addInfo('Product deleted from cart successfully');
            return redirect('/view/cart');
        }
    }

    public function confirmOrder(Request $request)
    {
        $request->validate([
            'receiver_name' => 'required',
            'receiver_address' => 'required',
            'receiver_phone' => 'required',
        ]);
        print_r($request->all());


        // Get User ID of login user
        $loginUserID = Auth::user()->id;

        // Get Cart Information
        $carts = Cart::where('user_id', $loginUserID)->get();

        foreach ($carts as $cart) {
            $order = new Order();
            $order->name = $request->receiver_name;
            $order->receiving_address = $request->receiver_address;
            $order->phone = $request->receiver_phone;
            $order->user_id = $loginUserID;
            $order->product_id = $cart->product_id;
            $result = $order->save();
        }

        // Remove data from the cart after the order place successfully
        $cartRemove = Cart::where('user_id', $loginUserID)->get();
        foreach ($cartRemove as $val) {
            $findRecord = Cart::find($val->id);
            $findRecord->delete();
        }

        if ($result) {
            toastr()
                ->timeOut(5000)
                ->closeButton()
                ->addInfo('Order Place Successfully');
        }
        return redirect('/view/cart');
    }

    public function myOrders($id)
    {
        if (Auth::check()) {
            $findUserOrders = Order::where('user_id', $id)->get();
            return view('user.MyOrders', compact('findUserOrders'));
        }
        return redirect()->route('logout.home');
    }
}