@extends('layouts.admin');

@section('title')
New product
@endsection

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            New Product
                        </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ( $errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('adminNewProductPost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="normal-input" class="form-control-label">Thumbnail</label>
                                                <input id="normal-input" class="form-control" value="" placeholder="" name="thumbnail" type="file">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="normal-input" class="form-control-label">Title</label>
                                                <input id="normal-input" class="form-control" value="" placeholder="Product title" name="title">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="textarea">Description</label>
                                                <textarea id="textarea" class="form-control" rows="6" name="description" placeholder="Description text"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="normal-input" class="form-control-label">Price</label>
                                                <input id="normal-input" class="form-control" value="" placeholder="10.00" name="price">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
