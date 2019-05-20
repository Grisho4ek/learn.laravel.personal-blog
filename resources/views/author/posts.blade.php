@extends('layouts.admin');

@section('title')
Author posts
@endsection

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header bg-light">
            Author Posts
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Comments</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach (Auth::user()->posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td class="text-nowrap"><a href="{{ route('singlePost', $post->id) }}">{{ $post->title }}</a></td>
                                <td>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                                <td>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</td>
                                <td>{{ $post->comments->count() }}</td>
                                <td>
                                    <form id="deletePost-{{ $post->id }}" action="{{ route('deletePost', $post->id) }}" method="POST">
                                        @csrf
                                    </form>
                                    {{-- <a href="#" onclick="document.getElementById('deleteComment-{{ $comment->id }}').submit()">X</a> --}}
                                    {{-- <button type="button" class="btn btn-danger" onclick="document.getElementById('deletePost-{{ $post->id }}').submit()">X</button> --}}
                                    <a href="{{ route('editPost', $post->id) }}" class="btn-warning btn">Edit</a>
                                    {{-- <a href="#" class="btn-danger btn" onclick="document.getElementById('deletePost-{{ $post->id }}').submit()">Remove</a> --}}
                                    <a class="btn-danger btn text-light" data-toggle="modal" data-target="#deletePostModal-{{ $post->id }}">Remove</a>
                                </td>
                            </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="deletePostModal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Deleting {{ $post->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you shure? Do you want to delete this post?</h5>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <a href="#" class="btn-danger btn" onclick="document.getElementById('deletePost-{{ $post->id }}').submit()">Yes</a>
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
