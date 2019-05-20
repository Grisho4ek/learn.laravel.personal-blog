@extends('layouts.admin');

@section('title')
Admin products
@endsection

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header bg-light">
            Products
            <a href="{{ route('adminNewProduct') }}" class="btn btn-primary ml-3">New Product</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ asset($product->thumbnail) }}" alt="" width="100"></td>
                                <td class="text-nowrap"><a href="{{ route('adminEditProduct', $product->id) }}">{{ $product->title }}</a></td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }} USD</td>
                                <td>
                                    <form id="deleteProduct-{{ $product->id }}" action="{{ route('adminDeleteProduct', $product->id) }}" method="POST">
                                        @csrf
                                    </form>
                                    <a href="{{ route('adminEditProduct', $product->id) }}" class="btn-warning btn">Edit</a>
                                    <a class="btn-danger btn text-light" data-toggle="modal" data-target="#deleteProductModal-{{ $product->id }}">Remove</a>
                                </td>
                            </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteProductModal-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Deleting {{ $product->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you shure? Do you want to delete this product?</h5>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <a href="#" class="btn-danger btn" onclick="document.getElementById('deleteProduct-{{ $product->id }}').submit()">Yes</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
