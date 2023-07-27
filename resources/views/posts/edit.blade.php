@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Update post</h2>
        <div class="lead">
            Edit post
        </div>

        <div class="container mt-4">

            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" value="{{ $post->title }}" class="form-control" name="title" placeholder="Title"
                        required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" value="{{ $post->description }}" class="form-control" name="description"
                        placeholder="Description" required>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <input type="text" value="{{ $post->body }}" class="form-control" name="body" placeholder="Body"
                        required>

                    @if ($errors->has('body'))
                        <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('posts.index') }}" class="btn btn-defaulr">Back</a>
            </form>
        </div>
    </div>
@endsection
