@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Edit Company</h1>
        <a href="{{ route('companies.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Back to Companies
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $company->name) }}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $company->email) }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="url" name="url" id="url" value="{{ old('url', $company->url) }}"
                           class="form-control @error('url') is-invalid @enderror">
                    @error('url')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control-file">
                    @if($company->logo_path)
                        <p class="mt-2">Current Logo:</p>
                        <img src="{{ $company->logo }}" alt="Logo" class="img-thumbnail" style="max-height: 100px;">
                    @endif
                    @error('logo')
                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
