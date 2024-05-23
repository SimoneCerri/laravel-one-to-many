@extends('layouts.admin')

@section('content')
    <header>
        <div class="container-fluid bg-dark py-3 text-danger">
            <div class="container d-flex align-items-center justify-content-between">
                <h1>
                    <strong>
                        Types
                    </strong>
                </h1>
                <a class="btn btn-danger text-dark" href="{{ route('admin.types.create') }}">
                    <i class="fa-solid fa-plus fa-lg fa-fw"></i>
                    <span class="fw-bold px-1">
                        ADD TYPE
                    </span>
                </a>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container">
            @include('partials.session-message')
            {{-- @dd(session('status')) --}}
            <h4 class="py-3">
                List of types:
            </h4>
            <div class="table-responsive rounded-top-3">
                <table class="table table-secondary align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-danger" scope="col">ID</th>
                            <th class="text-danger" scope="col">NAME</th>
                            <th class="text-danger" scope="col">SLUG</th>
                            <th class="text-danger text-center" scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($types as $type)
                            <tr class="">
                                <td scope="row">{{ $type->id }}</td>
                                <td scope="row">{{ $type->name }}</td>
                                <td scope="row">{{ $type->slug }}</td>
                                <td scope="row" class="text-center d-flex justify-content-evenly">
                                    <div class="px-1">
                                        <a class="btn btn-dark" href="{{ route('admin.types.show', $type) }}">
                                            <i class="fas fa-eye fa-sm fa-fw"></i>
                                        </a>
                                    </div>
                                    <div class="px-1">
                                        <a class="btn btn-dark" href="{{ route('admin.types.edit', $type) }}">
                                            <i class="fas fa-pencil fa-sm fa-fw"></i>
                                        </a>
                                    </div>
                                    <div class="px-1">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalId-{{ $type->id }}">
                                            <i class="fas fa-trash-can fa-sm fa-fw"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            Are you sure to delete {{ $type->name }} type ?
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">❌care❌care❌</div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('admin.types.destroy', $type) }}"
                                                            method="post">
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
                                </td>
                            </tr>
                        @empty
                            <tr class="">
                                <td scope="row" colspan="4">No types to show..</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $types->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection