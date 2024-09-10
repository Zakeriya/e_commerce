<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;


class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('sellers.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.sellers.createSeller');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSellerRequest $request)
    {
        Gate::forUser(Auth::guard('admin')->user())->authorize('add_seller');
        $data=$request->validated();

        if($request->has('image')){
            $data['image']=Storage::putFile('sellers',$data['image']);
        }

        Seller::create($data);

        return to_route('back.showSellers');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSellerRequest $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        // Gate::forUser(Auth::guard('admin')->user())->authorize('delete_seller');

        Gate::forUser(Auth::guard('admin')->user())->authorize('delete_product', $seller);

        unlink('storage/'.$seller->image);

        $seller->delete();

        return to_route('back.showSellers');
    }

    public function showSellers()
    {
        $sellers=Seller::all();

        // dd($sellers->seller_);

        return view('admins.sellers',get_defined_vars());
    }
}
