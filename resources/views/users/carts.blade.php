@extends('users.layout')

@section('carts-active')
    active
@endsection

@section('content')


<div class="d-flex justify-content-center align-items-center mt-5">
    @if (count($carts)>0)

        <div class="w-75 mt-5"> <!-- التحكم في عرض الجدول -->
            <h2 class="mb-4 text-center">Product List</h2>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Seller Name</th>
                        <th>Total Price</th>
                        <th>Quantity</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $totalPrice=0;
                    @endphp
                    @foreach ($carts as $cart)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- رقم الترتيب -->
                            @php
                                $product=App\Models\Product::findOrFail($cart->product_id);
                                $totalPrice+=$product->price*$cart->quantity;

                            @endphp


                                <td>{{ $product->name }}</td> <!-- اسم المنتج -->
                                <td>{{ $product->seller->name }}</td> <!-- اسم البائع -->
                                <!-- السعر -->
                                <td>
                                    <span >{{ $product->price*$cart->quantity }}</span>
                                </td>

                                <!-- الكمية -->
                                <td>
                                    {{ $cart->quantity }}
                                </td>
                                <td>
                                    <form action="{{ route('front.carts.destroy',['cart'=>$cart]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn border border-danger rounded-pill px-3 text-primary">Delete</button>
                                    </form>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
                </form>

            </table>
            <div class="text-center my-5">
                <span class="alert alert-dark">Total Price Is : {{$totalPrice  }}<span class="text-danger font-weight-bold">$</span></span>

            </div>
            <div class="text-center mt-3">
                <a href="#" class="btn btn-danger mx-3">Cash On Dilevery</a>
                <a href="{{ route('front.pay',['total_price'=>$totalPrice]) }}" class="btn btn-secondary mx-3">Pay By Using Card</a>
            </div>
        </div>
    @else
    <div class=" my-5 w-75">
        <div class="alert alert-danger mt-5 w-100 text-center "> No Carts </div>
    </div>

    @endif

</div>
@endsection