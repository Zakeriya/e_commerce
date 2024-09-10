@extends('admins.layout')
@section('purchases-color')
    bg-gradient-primary
@endsection
@section('content')

<div class="container mt-4">
    <h2 class="mb-4">products List</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>User Email</th>
                <th>Product Name</th>
                <th>Seller Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>User Phone </th>
                <th>User Address </th>
                <th>Product Iamge </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
                @php
                    $product=App\Models\Product::findOrFail($purchase->product_id);
                @endphp
                <tr>
                    <td>{{ $loop->iteration  }}</td>
                    <td>{{ $purchase->user_email }}</td>
                    <td>{{ $purchase->product_name }}</td>
                    <td>{{ $product->seller->name }}</td>
                    <td>{{ $purchase->product_price }}</td>
                    <td>{{ $purchase->pieces }}</td>
                    <td>{{ $purchase->phone }}</td>
                    <td>{{ $purchase->address }}</td>
                    <td><img src="{{ asset("storage/$product->image") }}" alt="" width="150"></td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

