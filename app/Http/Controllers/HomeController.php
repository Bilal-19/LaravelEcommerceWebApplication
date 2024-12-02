<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Stripe;
use Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('usertype', 'user')->count();
        $totalProducts = Product::all()->count();
        $totalOrders = Order::all()->count();
        $totalOrderDelivered = Order::where('status', 'Delivered')->count();
        return view("admin.index", compact(
            'totalUsers',
            'totalProducts',
            'totalOrders',
            'totalOrderDelivered'
        ));
    }

    public function stripe($value)
    {
        return view('user.Stripe', compact('value'));
    }
    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $value * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment."
        ]);
        // Get User ID of login user
        $loginUserID = Auth::user()->id;
        // Get Cart Information
        $carts = Cart::where('user_id', $loginUserID)->get();
        $username = Auth::user()->name;
        $userAddress = Auth::user()->address;
        $phone = Auth::user()->phone;
        foreach ($carts as $cart) {
            $order = new Order();
            $order->name = $username;
            $order->receiving_address = $userAddress;
            $order->phone = $phone;
            $order->user_id = $loginUserID;
            $order->product_id = $cart->product_id;
            $order->payment_status = "pay using card";
            $result = $order->save();
        }
        // Remove data from the cart after the order place successfully
        $cartRemove = Cart::where('user_id', $loginUserID)->get();
        foreach ($cartRemove as $val) {
            $findRecord = Cart::find($val->id);
            $findRecord->delete();
        }
        toastr()
            ->timeOut(5000)
            ->closeButton()
            ->addSuccess('Order Place Successfully');
        return redirect('/view/cart');
    }

}
