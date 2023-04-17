@extends('layouts.app')

@section('title')
    Index
@endsection

@section('content')
    <div class="text-center">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Create New Post</a>
    </div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Slug</th>
                <th scope="col">View</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id}}</td>
                    <td>{{ $post->title }}</td>
                    @if($post->user)
                    <td>{{ $post->user->name}}</td>
                    @else
                      <td>Not Found</td>
                    @endif
                    <td>
                    {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('MMMM Do YYYY') }}
                    </td>
                    <td>{{ $post->slug }}</td>
                        <td><a href="{{route('posts.show', ['id' => $post['id']]) }}"><button class="btn btn-info">View</button></a></td>
                        <td><a href="{{route('posts.edit', ['id' => $post['id']]) }}"><button class="btn btn-primary">Update</button></a></td>
                        <td>
                            <form action="{{route('posts.destroy', ['id' => $post['id']]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 
    {{ $posts->links() }}


@endsection