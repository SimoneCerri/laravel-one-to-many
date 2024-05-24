@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-danger">
        <div class="container">
            <h1>
                <strong>
                    Insert a new Type !
                </strong>
            </h1>
        </div>
    </header>
    <div class="container py-5">
        @include('partials.validation-messagge')
        <form action="{{ route('admin.types.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">New type :</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelpId" placeholder="Laravel" value="{{ old('name') }}" />
                <small id="nameHelpId" class="form-text text-muted">Insert a type name</small>
                @error('name')
                    <div class="text-danger py-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-dark text-success">
                    <i class="fa-solid fa-plus fa-lg fa-fw"></i>
                    <span class="fw-bold px-1">
                        CREATE
                    </span>
                </button>
                <div class="px-3">
                    <a class="btn btn-dark text-danger" href="{{ route('admin.projects.index') }}">
                        <i class="fa-solid fa-rotate-left"></i>
                        <span class="px-2 fw-bold">
                            CANCEL AND BACK TO PROJECTS
                        </span>
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
