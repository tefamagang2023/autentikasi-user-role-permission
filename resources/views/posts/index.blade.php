@extends('layouts.app-master')


@section('content')
    <h1 class="mb-3">User Role and Permissions</h1>

    <div class="bg-light p-4 rounded">
        <h2>Post</h2>
        <div class="lead">
            Manage your posts here
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right">Add post</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
            <tr>
                <th width="1%">No</th>
                <th>Name</th>
                <th widht="3%" colspan="3">Action</th>
            </tr>
            @foreach ($posts as $key => $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm"> Show</a>
                    </td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm"> Edit</a>
                    </td>
                    <td>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['posts.destroy', $posts->id],
                            'style' => 'display:inline',
                        ]) !!}
                        {!! Form::submit('delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $posts->links() !!}
        </div>
    </div>
@endsection
