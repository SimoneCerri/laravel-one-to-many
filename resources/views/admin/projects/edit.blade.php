@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-danger">
        <div class="container">
            <h1>
                <strong>
                    Edit "{{ $project->title }}" project..
                </strong>
            </h1>
        </div>
    </header>
    <div class="container py-5">
        @include('partials.validation-messagge')
        <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="titleHelpId" placeholder="New title" value="{{ old('title', $project->title) }}" />
                <small id="titleHelpId" class="form-text text-muted">Change the title</small>
                @error('title')
                    <div class="text-danger py-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="url1" class="form-label fw-bold">GitHub link</label>
                <input type="text" class="form-control @error('url1') is-invalid @enderror" name="url1" id="url1"
                    aria-describedby="url1HelpId" placeholder="New url.." value="{{ old('url1', $project->url1) }}" />
                <small id="url1HelpId" class="form-text text-muted">Change the GitHub link</small>
                @error('url1')
                    <div class="text-danger py-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="url2" class="form-label fw-bold">Preview link</label>
                <input type="text" class="form-control @error('url2') is-invalid @enderror" name="url2" id="url2"
                    aria-describedby="url2HelpId" placeholder="New url.." value="{{ old('url2', $project->url2) }}" />
                <small id="url2HelpId" class="form-text text-muted">Change the preview link</small>
                @error('url2')
                    <div class="text-danger py-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex py-3">
                <div class="mb-3 px-3">
                    <div class="row align-items-center">
                        <div class="col">
                            @if (Str::startsWith($project->img, 'https://'))
                                <img width="250" src="{{ $project->img }}" alt="">
                            @else
                                <img width="250" src="{{ asset('storage/' . $project->img) }}" alt="">
                            @endif
                        </div>
                        <div class="col flex-grow-1">
                            <label for="img" class="form-label fw-bold">Image</label>
                            <input type="file" class="form-control @error('img') is-invalid @enderror" name="img"
                                id="img" aria-describedby="imgHelpId" placeholder="New image" value="" />
                            <small id="imgHelpId" class="form-text text-muted">Change the image</small>
                            @error('img')
                                <div class="text-danger py-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 py-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option selected disabled>Select one</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}" {{$type->id == old('type_id',$project->type_id) ? 'selected' : '' }} >{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 py-3">
                <label for="content" class="form-label fw-bold">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="6"
                    placeholder="Update the content here..">{{ old('content', $project->content) }}</textarea>
                @error('content')
                    <div class="text-danger py-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-dark text-success">
                    Save changes
                </button>
                <div class="">
                    <a class="btn btn-dark text-danger" href="{{ route('admin.projects.index') }}">Return to projects</a>
                </div>
            </div>
        </form>
    </div>
@endsection
