
@extends('sellers.layout')

@section('content')

    {{-- <div class="d-flex justify-content-center align-items-center">
        <form action="{{ route('products.store') }}" method="post">
            @csrf
            <input type="hidden" name="seller_id" value="{{ Auth::guard('seller')->user()->id }}">
            <div>
                <label for="name">Product Name</label>
                <input type="text" name="name" id="" placeholder="Enter Product Name Here"class="form-control">
            </div>
            <div>
                <label for="desc">Product Description</label>
                <input type="text" name="desc" id="" placeholder="Enter Product Description Here" class="form-control">
            </div>
            <div>
                <label for="image">Product Name</label>
                <input type="file" name="image" id="">
            </div>
            <div>
                <button type="submit" class="btn btn-info">Add</button>
            </div>
        </form>
    </div> --}}

    <div class="container d-flex justify-content-center " style="margin-top: 160px;">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @csrf
            <input type="hidden" name="seller_id" value="{{ Auth::guard('seller')->user()->id }}">
            <div class="my-3">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="" placeholder="Enter Product Name Here"class="form-control">
            </div>
            <div class="my-3">
                <label for="desc">Product Description</label>
                <input type="text" name="desc" id="" placeholder="Enter Product Description Here" class="form-control">
            </div>
            <div class="my-3">
                <label for="desc">Product Price</label>
                <input type="number" name="price" id="" placeholder="Enter Product Price Here" class="form-control">
            </div>
            <div class="my-3">
                <label for="image">Product Image</label>
                <input type="file" name="image" id="">
            </div>
            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-info">Add</button>
            </div>
        </form>
    </div>

@endsection