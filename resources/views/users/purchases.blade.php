@extends('users.layout')

@section('pay-active')
    active
@endsection
@section('content')


<div class="d-flex justify-content-center align-items-center mt-5">
    <div class="w-75 mt-5"> <!-- التحكم في عرض الجدول -->
        <h2 class="mb-4 text-center">Product List</h2>
        @if (count($purchases)>0)

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Total Price</th>
                        <th>Quantity</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($purchases as $purchase)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- رقم الترتيب -->
                                <td>{{ $purchase->product_name }}</td> <!-- اسم المنتج -->
                                <td>{{ $purchase->product_price }}</td> <!-- اسم البائع -->
                                <!-- السعر -->
                                <td>
                                    <span >{{ $purchase->pieces }}</span>
                                </td>

                                <!-- الكمية -->
                                <td>
                                    {{ $purchase->phone }}
                                </td>

                                <td>
                                    {{ $purchase->address }}
                                </td>
                        </tr>
                    @endforeach
                </tbody>
                </form>

            </table>

        @else
            <div class=" my-5 w-75">
                <div class="alert alert-danger mt-5 w-100 text-center "> No Purchases </div>
            </div>
        @endif

    </div>
</div>
@endsection