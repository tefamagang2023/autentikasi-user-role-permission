@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Edit Permission</h2>
        <div class="lead">
            Editing permission
        </div>

        <div class="container mt-4">

            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                @method('path')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="{{ $permission->name }}" class="form-control" name="name"
                        placeholder="name" required>


                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save Permission</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
