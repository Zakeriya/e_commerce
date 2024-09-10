@extends('sellers.layout')


@section('content')


<div class="d-flex justify-content-center align-items-center mt-5">
    @if (count($myPurchases)>0)

        <div class="w-75 mt-5"> <!-- التحكم في عرض الجدول -->
            <h2 class="mb-4 text-center">Product List</h2>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Total Price</th>
                        <th>Quantity</th>
                        <th>Buyer Email</th>
                        <th>Phone</th>
                        <th>Date Of Purchase</th>

                    </tr>
                </thead>

                <tbody>
                    @php
                        $totalPrice=0;
                    @endphp
                    @foreach ($myPurchases as $purchases)
                        @foreach ($purchases as $purchase)

                            <tr>
                                <td>{{ $loop->iteration }}</td> <!-- رقم الترتيب -->

                                    <td>{{ $purchase->product_name }}</td> <!-- اسم المنتج -->
                                    <td>{{ $purchase->product_price }}</td> <!-- اسم المنتج -->

                                    <!-- السعر -->
                                    <td>
                                        <span >{{ $purchase->pieces }}</span>
                                    </td>

                                    <!-- الكمية -->
                                    <td>
                                        {{ $purchase->user_email }}
                                    </td>

                                    <td>
                                        {{ $purchase->phone }}
                                    </td>

                                    <td>
                                        {{ $purchase->created_at->format('Y m d') }}
                                    </td>

                            </tr>
                        @endforeach

                    @endforeach
                </tbody>
                </form>

            </table>
        </div>
    @else
    <div class=" my-5 w-75">
        <div class="alert alert-danger mt-5 w-100 text-center "> No Purchases For Your Products  </div>
    </div>

    @endif

</div>
@endsection