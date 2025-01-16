@extends('adminlte::page')

@section('title', 'Create Company')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Create Company</h1>
        <a href="{{ route('companies.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Back to Companies
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Назва компанії</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="url" class="form-label">URL</label>
                    <input type="url" name="url" id="url" value="{{ old('url') }}" class="form-control @error('url') is-invalid @enderror">
                    @error('url')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror">
                    @error('logo')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
@stop
