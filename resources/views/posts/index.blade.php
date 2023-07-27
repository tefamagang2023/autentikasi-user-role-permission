@extends('layouts.app-master')


@section('content')
    <h1 class="mb-3">User Role and Permissions</h1>

    <div class="bg-light p-4 rounded">
        <h2>Post</h2>

        @can('add posts')
            <div class="lead">
                Manage your posts here
                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right">Add post</a>
            </div>
        @endcan

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        @can('read posts')
            <table class="table table-bordered">
                <tr>
                    <th width="1%">No</th>
                    <th>Name</th>
                    <th widht="3%" colspan="3">Action</th>
                </tr>
                @php
                    $no = 1;
                @endphp
                @foreach ($posts as $key => $post)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $post->title }}</td>

                        @can('show posts')
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm"> Show</a>
                            </td>
                        @endcan

                        @can('edit posts')
                            <td>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm"> Edit</a>
                            </td>
                        @endcan

                        @can('delete posts')
                            <td>
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['posts.destroy', $post->id],
                                    'style' => 'display:inline',
                                ]) !!}
                                {!! Form::submit('delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        @endcan


                        @php
                            $no++;
                        @endphp
                    </tr>
                @endforeach
            </table>
        @endcan




        <div class="d-flex">
            {!! $posts->links() !!}
        </div>
    </div>
@endsection
