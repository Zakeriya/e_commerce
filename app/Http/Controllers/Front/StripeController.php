<?php

namespace App\Http\Controllers\Front;

use Stripe;
use App\Models\Cart;
use App\Models\Product;

// use Session;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session ;

class StripeController extends Controller
{
    public function stripe($totalPrice)
    {
        // dd($totalPrice);
        return view('users.payments.pay',compact('totalPrice'));
    }

    public function stripePost(Request $request)
    {


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $request->input('totalPrice') *100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Tpayment has been done successfully"
        ]);

        $carts=Cart::where('user_id',Auth::user()->id)->get();
        // dd($carts);

        foreach ($carts as $cart)
        {
        $product=Product::findOrFail($cart->product_id);
            $total_price=$product->price * $cart->quantity;
            $buy=Purchase::create([
                'user_email'=>Auth::user()->email,
                'product_name'=>$product->name,
                'product_price'=>$total_price,
                'pieces'=>$cart->quantity,
                'phone'=>Auth::user()->phone,
                'address'=>Auth::user()->address,
                'product_id'=>$cart->product_id
            ]);

            $cart->delete();

        }
        return to_route('front.purchases.index')->with('success', 'Payment successful!');

        // Session::flash('success', 'Payment successful!');

        // return back();
    }
}
