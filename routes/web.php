<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [UserController::class, 'index'])->name('Home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// 1. Home Controller
Route::get("/admin/dashboard", [HomeController::class, 'index'])->name('admin.home');


// Admin Controller Routes
Route::get("/admin/dashboard/category", [AdminController::class, 'viewCategories'])->name('view.category');

// Route for Adding Category to Database
Route::post("admin/add/category", [AdminController::class, 'addCategory'])->name('add.category');


// Route for deleting category from database
Route::get("/admin/delete/category/{id}", [AdminController::class, 'deleteCategory'])->name('delete.category');

// Route for editing category into database
Route::get("/admin/edit/category/{id}", [AdminController::class, 'editCategory'])->name('edit.category');

// Route for updating category to database
Route::post("/admin/update/category/{id}", [AdminController::class, 'updateCategory'])->name('update.category');

// Route for viewing add product form
Route::get("/admin/add/product", [AdminController::class, 'viewAddProductForm'])->name('add.product');


// Route for storing product to database
Route::post("/admin/store/product", [AdminController::class, 'storeProductToDatabase'])->name('store.product');


// Route for listing products from database
Route::get("/admin/view/products", [AdminController::class, 'viewProducts'])->name('view.product');

// Route for deleting product from database
Route::get("/admin/delete/product/{id}", [AdminController::class, 'deleteProduct'])->name('delete.product');

// Route for viewing the Edit Product Form
Route::get("/admin/edit/product/{id}", [AdminController::class, 'editProduct'])->name('edit.product');

// Route for updating product to database
Route::post("/admin/store/updated/product/{id}", [AdminController::class, 'storeUpdatedProductToDatabase'])->name('update.product');

// Route for logout - user
Route::get("/logout", [AdminController::class, 'LogOut'])->name('logout.home');


// User controller
Route::get("/dashboard", [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('Home');


Route::get("/product/view/{id}", [UserController::class, 'viewSpecificProduct'])->name('view-user.product');

// Route for Adding Product to Cart
Route::get("/product/add/cart/{id}", [UserController::class, 'addToCart'])->name('add.cart');


// Route for view cart page
Route::get("/view/cart", [UserController::class, 'viewCart'])->name('view.cart');

// Route for deleting product from cart
Route::get("/delete/cart/{id}", [UserController::class, 'deleteFromCart'])->name('delete.product.cart');


// Route for placing customer order information into database
Route::post("/place/order", [UserController::class, 'confirmOrder'])->name('confirm.order');


// Route for displaying orders from database
Route::get("/view/orders", [AdminController::class, 'viewOrders'])->name('view.orders');

// Route for updating order status
Route::get("/order/status/{id}", [AdminController::class, 'updateOrderStatus'])->name('update.status');

// Route for printing PDF document
Route::get("/print/pdf/{id}", [AdminController::class, 'printPDF'])->name('printPDF');

// Route for showing 'My Orders' to users
Route::get("/my/orders/{id}",[UserController::class, 'myOrders'])->name('my.orders');


// Route for Payment Gateway

Route::controller(HomeController::class)->group(function(){

    Route::get('stripe/{value}', 'stripe');

    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');

});
