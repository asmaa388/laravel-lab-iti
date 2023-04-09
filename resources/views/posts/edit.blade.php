@extends('layouts.app')

@section('title')
    Create
@endsection

@section('content')
    <form method="POST" action="{{ route('posts.update', ['id' => $post['id']]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post['title'] }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3">{{ $post['description'] }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select name="post_creater" class="form-control">
                
            @foreach ($users as $user)
               <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

            </select>
        </div>
        <button class="btn btn-success">update</button>
    </form>
@endsection