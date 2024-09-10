<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\User;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $carts = Cart::where('user_id',Auth::user()->id)->get();

        return view('users.carts',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request )
    {
        // dd($request->all());
        $data=$request->validated();

        $cart=Cart::create([
            'user_id'=>$request->input('user_id'),
            'product_id'=>$request->input('product_id')
        ]);

        // DB::table('cart_product')->insert([
        //     'product_id'=>$request->input('product_id'),
        //     'total_price'=>$request->input('total_price'),
        //     'quantity'=>$request->input('quantity'),
        //     'cart_id'=>$cart->id,
        // ]);

        return to_route('front.carts.index');

        echo 'Done';



    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function create_cart(Request $request ,$product_id)
    {
        // dd($request->all());
        $findProduct=Product::findOrFail($product_id);
        // $user=User::where('id',Auth::user()->id)->first();
        $username = Auth::user()->username;
        $address=Auth::user()->address;
        $phone=Auth::user()->phone;

        $cart=Cart::create([
            'product_id'=>$product_id,
            'user_id'=>Auth::user()->id,
            'phone'=>$phone,
            'address'=>$address,
            'quantity'=>$request->input('quantity'),
        ]);

        return to_route('front.carts.index');
    }


}
