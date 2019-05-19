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
                        <th>Edit</th>
                        <th>Delete</th>
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
                                    edit soon
                                </td>
                                <td>
                                    <form id="deletePost-{{ $post->id }}" action="{{ route('deletePost', $post->id) }}" method="POST">
                                        @csrf
                                    </form>
                                    {{-- <a href="#" onclick="document.getElementById('deleteComment-{{ $comment->id }}').submit()">X</a> --}}
                                    <button type="button" class="btn btn-danger" onclick="document.getElementById('deletePost-{{ $post->id }}').submit()">X</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
