@extends('layouts.admin')

@section('content')
    <header>
        <div class="container-fluid bg-dark py-3 text-danger">
            <div class="container d-flex align-items-center justify-content-between">
                <h1>
                    <strong>
                        {{$type->name}}
                    </strong>
                </h1>
            </div>
        </div>
    </header>

    <section class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-4"><span class="fw-bold">Type ID:</span></div>
                <div class="col-4"><span class="fw-bold">Name:</span></div>
                <div class="col-4"><span class="fw-bold">Slug:</span></div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col-4">
                    <span scope="row">{{ $type->id }}</span>
                </div>
                <div class="col-4">
                    <span scope="row">{{ $type->name }}</span>
                </div>
                <div class="col-4">
                    <span scope="row">{{ $type->slug }}</span>
                </div>
            </div>
        </div>
        <div class="container py-5 d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <div class="">
                    <a class="btn btn-dark" href="{{ route('admin.types.edit', $type) }}">
                        <i class="fas fa-pencil fa-lg fa-fw"></i>
                        <span class="px-2 fw-bold">
                            EDIT
                        </span>
                    </a>
                </div>
                <div class="px-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#modalId-{{ $type->id }}">
                        <span class="px-2 fw-bold">
                            DELETE
                        </span>
                        <i class="fas fa-trash-can fa-lg fa-fw"></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="modalNameId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-name" id="modalNameId">
                                        Are you sure to delete {{ $type->name }} type ?
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">❌care❌care❌</div>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.types.destroy', $type) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Delete this type
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <a class="btn btn-dark text-danger fw-bold" href="{{ route('admin.types.index') }}">
                    <i class="fa-solid fa-rotate-left"></i>
                    <span>
                        RETURN TO TYPES
                    </span>
                </a>
            </div>
        </div>
    </section>
@endsection
