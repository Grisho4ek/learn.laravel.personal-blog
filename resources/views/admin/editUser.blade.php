@extends('layouts.admin');

@section('title')
    Editing {{ $user->name }}
@endsection

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        Edit {{ $user->name }}
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
                    <form action="{{ route('adminPostEditUser', $user->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="normal-input" class="form-control-label">Name</label>
                                        <input id="normal-input" class="form-control" value="{{ $user->name }}" placeholder="name" name="name">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="textarea" class="form-control-label">Email</label>
                                        <input id="normal-input" class="form-control" value="{{ $user->email }}" placeholder="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="normal-input" class="form-control-label">Permissions</label>
                                        <input type="checkbox" class="form-control" name="author" value=1 {{ $user->author == true ? 'checked' : ''}}>Author
                                        <br>
                                        <input type="checkbox" class="form-control" name="admin" value=1 {{ $user->admin == true ? 'checked' : ''}}>Admin
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
