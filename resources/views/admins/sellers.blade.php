@extends('admins.layout')
@section('sellers-color')
    bg-gradient-primary
@endsection
@section('content')

<div class="container mt-4">
    @if (permission('admin','add_seller'))

        <div class="text-start mb-3 d-flex justify-content-end m-3">
            <a href="{{ route('back.sellers.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    @endif

    <h2 class="mb-4">Sellers List</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Products</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sellers as $seller)
                <tr>
                    <td>{{ $loop->iteration  }}</td>
                    <td>{{ $seller->name }}</td>
                    <td>{{ $seller->email }}</td>
                    <td>
                        @if ($seller->image)
                            <img src="{{ asset('storage/' . $seller->image) }}" alt="{{ $seller->name }}" class="img-thumbnail" width="150">
                        @else
                            No image
                        @endif
                    </td>
                    <td>
                        <ul>
                            @foreach ($seller->products as $product)
                                <li>{{ $product->name }}</li>
                            @endforeach
                        </ul>
                    </td>

                    <td>
                        @if (permission('admin','delete_seller'))

                            <form action="{{ route('back.sellers.destroy', ['seller' => $seller->id]) }}" method="POST" onsubmit="confirmDelete(event, '{{ $seller->id }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background: none; cursor: pointer;">
                                    <i class="fas fa-trash-alt" style="font-size: 24px; color: red;"></i>
                                </button>
                            </form>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

