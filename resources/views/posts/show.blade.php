@extends('layouts.app')

@section('title')
    Show
@endsection

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{ $post->title}}</h5>
            <p class="card-text">Description: {{ $post->description}}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>
    <div class="card mt-4">
    <div class="card-header">
        Comments
    </div>
    <form action="{{ route('comments.store',['post'=>$post->id]) }}" method="POST">
            @csrf
            <label>Comment:</label>
            <textArea type="text" name="body" class="form-control" placeholder="Enter your comment" ></textArea>
            <input type="submit" class="btn btn-success mt-2">
            <input type="hidden" name="commentable_type">
            <input type="hidden" name="commentable_id">
    </form>
    <div class="card-body  mt-4">
    @foreach($post->comments as $comment)
        <div class="card mt-1">
            <div class="card-body  mt-2">
                  {{  $comment->body }}
            </div>
        </div>
    @endforeach

    </div>
</div>
@endsection