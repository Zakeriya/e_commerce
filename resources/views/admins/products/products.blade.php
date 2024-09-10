@extends('admins.layout')
@section('products-color')
    bg-gradient-primary
@endsection
@section('content')

<div class="container mt-4">
    <h2 class="mb-4">products List</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Desc</th>
                <th>Price</th>
                <th>Seller Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration  }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->desc }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->seller->name }}</td>
                    <td><img src="{{ asset("storage/$product->image") }}" alt="" width="150"></td>
                    @if (permission('admin','delete_product'))


                    <td>
                        <form action="{{ route('back.products.destroy', ['product' => $product->id]) }}" method="POST" onsubmit="confirmDelete(event, '{{ $product->id }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: none; cursor: pointer;">
                                <i class="fas fa-trash-alt" style="font-size: 24px; color: red;"></i>
                            </button>
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

