@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Update Role</h1>
        <div class="lead">
            Edit role ande manage permission
        </div>

        <div class="container mt-4">
            @if ($count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops !</strong>There were some problems with your input. <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @method('path')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="{{ $role->name }}" class="form-control" name="name" placeholder="Name"
                        required>
                </div>

                <label for="permissions" class="form-label">Asign Permissions</label>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if ($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', false);
                    });
                }

            });
        });
    </script>
@endsection
