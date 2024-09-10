<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        // dd(Auth::guard('seller')->user()->id);
        return view('admins.products.products',get_defined_vars());
        // return view('sellers.index',get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Gate::forUser(Auth::guard('seller')->user())->authorize('delete_product', $product);

        $product->delete();

        return to_route('back.products.index');
    }


}