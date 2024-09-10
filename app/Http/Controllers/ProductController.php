<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Purchase;
use App\Models\Seller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::where('seller_id',Auth::guard('seller')->user()->id)->get();
        // dd(Auth::guard('seller')->user()->id);
        return view('sellers.products',get_defined_vars());
        // return view('sellers.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sellers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());

        $data=$request->validated();

        if($request->has('image')){
            $data['image']=Storage::putFile('products',$data['image']);
        }

        Product::create($data);

        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        Gate::forUser(Auth::guard('seller')->user())->authorize('edit_product', $product);
        return view('sellers.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data=$request->validated();

        // $product=Product::findOrFail($product->id);
        if($request->has('image'))
        {
            Storage::delete($product->image);
            $data['image']=Storage::putFile('products',$data['image']);
        }

        $product->update($data);

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Gate::forUser(Auth::guard('admin')->user())->authorize('delete_product', $product);

        // $this->authorize('delete', Product::class);

        $product->delete();

        return to_route('products.index');
    }

    public function soldProduct()
    {

        $myProducts=Product::where('seller_id',Auth::guard('seller')->user()->id)->get();
        // dd($myProducts);
        $myPurchases=[];
        foreach ($myProducts as $product)
        {
            $myPurchases[]=Purchase::where('product_id',$product->id)->get();
        }

        // dd($purchases);

        return view('sellers.mySolds',compact('myPurchases'));
    }
}
