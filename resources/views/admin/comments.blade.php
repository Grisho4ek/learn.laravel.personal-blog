@extends('layouts.admin');

@section('title')
    Admin Comments
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
                        <th>Post</th>
                        <th>Content</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td class="text-nowrap"><a href="{{ route('singlePost', $comment->post->id) }}">{{ $comment->post->title }}</a></td>
                                <td>{{ $comment->content }}</td>
                                <td>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</td>
                                <td>
                                    <form id="deleteComment-{{ $comment->id }}" action="{{ route('adminDeleteComment', $comment->id) }}" method="POST">
                                        @csrf
                                    </form>
                                    {{-- <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteComment-{{ $comment->id }}').submit()">X</button> --}}
                                    <a class="btn-danger btn text-light" data-toggle="modal" data-target="#deleteCommentModal-{{ $comment->id }}">Remove</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteCommentModal-{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Deleting comment for {{ $comment->post->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you shure? Do you want to delete this comment?</h5>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <a href="#" class="btn-danger btn" onclick="document.getElementById('deleteComment-{{ $comment->id }}').submit()">Yes</a>
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
