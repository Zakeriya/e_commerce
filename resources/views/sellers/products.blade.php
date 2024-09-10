@extends('sellers.layout')

@section('content')

        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 text-secondary">100% Original Products</h4>
                        <h1 class="mb-5 display-3 text-primary">Trusted Sellers & Cheap Products</h1>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="{{asset('users-sellers')}}/img/banner2.jpg" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Products</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="{{asset('users-sellers')}}/img/banner.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Goods</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->

        <!-- Fruits Shop Start-->
        @if (count($products)>0)

            <div class="container-fluid fruite py-5">
                <div class="container py-5">
                    <div class="tab-class text-center">
                        <div class="row g-4">
                            <div class="col-lg-4 text-start">
                                <h1>My Products</h1>
                            </div>
                            {{-- <div class="col-lg-8 text-end">
                                <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                    <li class="nav-item">
                                        <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                            <span class="text-dark" style="width: 130px;">All Products</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                            <span class="text-dark" style="width: 130px;">Vegetables</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                            <span class="text-dark" style="width: 130px;">Fruits</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                            <span class="text-dark" style="width: 130px;">Bread</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                                            <span class="text-dark" style="width: 130px;">Meat</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="row g-4">
                                            @foreach ($products as $product)
                                                <div class="col-md-6 col-lg-4 col-xl-3">
                                                    <div class="rounded position-relative fruite-item">
                                                        <div class="fruite-img">
                                                            <img src="{{ asset("storage/$product->image") }}" class="img-fluid w-100 rounded-top" alt="">
                                                        </div>
                                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><a href="{{ route('products.edit',['product'=>$product]) }}">Edit</a></div>
                                                        <div class="text-white bg-danger px-3  rounded position-absolute" style="top: 10px; right: 10px;">
                                                            <form action="{{ route('products.destroy',['product'=>$product]) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                            <h4>{{ $product->name }}</h4>
                                                            <p>{{ $product->desc }}</p>
                                                            <div class="d-flex justify-content-center flex-lg-wrap">
                                                                <p class="text-dark fs-5 fw-bold mb-0">$<span class="text-danger">{{ $product->price }}</span> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger text-center w-75 m-auto"> No Products For You</div>
        @endif

        <!-- Fruits Shop End-->

@endsection