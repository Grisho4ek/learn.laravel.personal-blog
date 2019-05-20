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
            <h1>{{ $product->title }}</h1>
            </div>
        </div>
        </div>
    </div>
    </header>

    <!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset( $product->thumbnail ) }}" class="card-img-top" alt="...">
        </div>
        <div class="col-md-8">
            <h1 class="card-title">{{ $product->title }}</h1>
            <hr>
            <h5 class="card-text">{{ $product->description }}</h5>
            <hr>
            <h5 class="card-text">{{ $product->price }} USD</h5>
            <hr>
            <a href="#" class="btn btn-primary mx-auto">Checkout with paypall</a>
        </div>
        <hr>
    </div>
</div>


@endsection
