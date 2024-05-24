@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-danger">
        <div class="container">
            <h1>
                <strong>
                    Edit "{{ $type->name }}" type..
                </strong>
            </h1>
        </div>
    </header>
    <div class="container py-5">
        @include('partials.validation-messagge')
        <form action="{{ route('admin.types.update', $type) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 py-3">
                <label for="oldName" class="form-label">Old type</label>
                <select class="form-select" name="oldName" id="oldName">
                    <option selected>{{ $type->name }}</option>
                </select>
            </div>
            <div class="mb-3 py-3">
                <label for="name" class="form-label">New type</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelpId"
                    placeholder="Laravel" />
                <small id="nameHelpId" class="form-text text-muted">Change type..</small>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-dark text-success">
                    Save changes
                </button>
                <div class="">
                    <a class="btn btn-dark text-danger" href="{{ route('admin.types.index') }}">Return to types</a>
                </div>
            </div>
        </form>
    </div>
@endsection
