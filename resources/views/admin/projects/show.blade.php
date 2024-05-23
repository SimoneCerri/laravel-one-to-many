@extends('layouts.admin')

@section('content')
    <header>
        <div class="container-fluid bg-dark py-3 text-danger">
            <div class="container d-flex align-items-center justify-content-between">
                <h1>
                    <strong>
                        {{ $project->title }}
                    </strong>
                </h1>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-2"><span class="fw-bold">Project ID:</span></div>
                <div class="col-3"><span class="fw-bold">Image:</span></div>
                <div class="col-4"><span class="fw-bold">GitHub:</span></div>
                <div class="col-3"><span class="fw-bold">Preview:</span></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <span scope="row">{{ $project->id }}</span>
                </div>
                <div class="col-4">
                    @if (Str::startsWith($project->img, 'https://'))
                        <img width="250" src="{{ $project->img }}" alt="">
                    @else
                        <img width="250" src="{{ asset('storage/' . $project->img) }}" alt="">
                    @endif
                </div>
                <div class="col-3">
                    <span scope="row">{{ $project->url1 }}</span>
                </div>
                <div class="col-3">
                    <span scope="row">{{ $project->url2 }}</span>
                </div>
            </div>
        </div>
        <div class="container py-3">
            <hr>
        </div>
        <div class="container">
            <div class="row text-center py-3">
                <div class="col-12">
                    <span class="fw-bold">Type:</span> <br>
                    <span scope="col-12">{{ $project->type ? $project->type->name : "Not selected" }}</span>
                </div>
            </div>
            <div class="row text-center py-3">
                <div class="col-12">
                    <span class="fw-bold">Description:</span> <br>
                    <span scope="col-12">{{ $project->content }}</span>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <hr>
        </div>
        <div class="container py-5 d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <div class="">
                    <a class="btn btn-dark" href="{{ route('admin.projects.edit', $project) }}">
                        <i class="fas fa-pencil fa-lg fa-fw"></i>
                        <span class="px-2 fw-bold">
                            EDIT
                        </span>
                    </a>
                </div>
                <div class="px-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#modalId-{{ $project->id }}">
                        <span class="px-2 fw-bold">
                            DELETE
                        </span>
                        <i class="fas fa-trash-can fa-lg fa-fw"></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Are you sure to delete {{ $project->title }} project ?
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">❌care❌care❌</div>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Delete this project
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <a class="btn btn-dark text-danger fw-bold" href="{{ route('admin.projects.index') }}">
                    <i class="fa-solid fa-rotate-left"></i>
                    <span>
                        RETURN TO PROJECTS
                    </span>
                </a>
            </div>
        </div>
    </section>
@endsection
