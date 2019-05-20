@extends('layouts.master')

@section('title')
    Shop
@endsection

@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('{{ asset('assets/img/home-bg.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
                <h1>Shop</h1>
                <span class="subheading">Super cool t-shirts</span>
            </div>
        </div>
        </div>
    </div>
</header>

    <!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-12 d-flex">
            @foreach ( $products as $product)
                <div class="card m-3" style="width: 18rem;">
                    <a href="{{ route('shop.SingleProduct', $product->id ) }}"><img src="{{ asset( $product->thumbnail ) }}" class="card-img-top" alt="..." width="200" height="200" style="object-fit:cover;"></a>
                    <div class="card-body">
                        <a href="{{ route('shop.SingleProduct', $product->id ) }}">
                        <h5 class="card-title">{{ $product->title }}</h5></a>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">{{ $product->price }} USD</p>
                        <a href="#" class="btn btn-primary mx-auto d-block">Checkout with paypall</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection



