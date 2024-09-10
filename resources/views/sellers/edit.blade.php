
@extends('sellers.layout')

@section('content')
<div class="container d-flex justify-content-center " style="margin-top: 170px;">
    <form action="{{ route('products.update',$product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1 class="text-success my-3 text-center" style="margin-bottom: 10px;">Edit Product</h1>
            <input type="hidden" name="seller_id" value="{{ Auth::guard('seller')->user()->id }}">
            <div class="my-3">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="my-3">
                <label for="desc">Product Description</label>
                <input type="text" name="desc" id=""  class="form-control" value="{{ $product->desc }}">
            </div>
            <div class="my-3">
                <label for="desc">Product Price</label>
                <input type="number" name="price" id=""  class="form-control" value="{{ $product->price }}">
            </div>
            <div class="my-3">
                <label for="image">Product Image</label>
                <input type="file" name="image" id="">
                <img src="{{ asset("storage/$product->image") }}" alt="" width="150px">
            </div>
            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-info">Edit</button>
            </div>
        </form>
    </div>

@endsection