@extends('layouts.admin');

@section('title')
    Admin Users
@endsection

@section('content')
 <div class="content">
    <div class="card">
        <div class="card-header bg-light">
            Comments
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Posts</th>
                        <th>Comments</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->posts->count() }}</td>
                                <td>{{ $user->comments->count() }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}</td>
                                <td>
                                    <form id="deleteUser-{{ $user->id }}" action="{{ route('adminDeleteUser', $user->id) }}" method="POST">
                                        @csrf
                                    </form>
                                    <a href="{{ route('adminEditUser', $user->id) }}" class="btn-warning btn">Edit</a>
                                    {{-- <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteUser-{{ $user->id }}').submit()">X</button> --}}
                                    <a class="btn-danger btn text-light" data-toggle="modal" data-target="#deleteUserModal-{{ $user->id }}">Remove</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteUserModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Deleting user: {{ $user->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you shure? Do you want to delete user: {{ $user->name }}?</h5>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <a href="#" class="btn-danger btn" onclick="document.getElementById('deleteUser-{{ $user->id }}').submit()">Yes</a>
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
