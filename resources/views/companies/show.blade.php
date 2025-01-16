@extends('adminlte::page')

@section('title', $company->name)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>{{ $company->name }}</h1>
        <a href="{{ route('companies.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Back to Companies
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center mb-4">
                <div class="rounded-circle overflow-hidden" style="width: 100px; height: 100px; margin-right: 15px;">
                    <img src="{{ $company->logo }}" alt="Logo" class="img-fluid">
                </div>
                <div class="ms-4">
                    <h3 class="text-primary">{{ $company->name }}</h3>
                    <p class="mb-1">
                        <strong>Email:</strong> <a href="mailto:{{ $company->email }}" class="text-blue">{{ $company->email }}</a>
                    </p>
                    <p class="mb-1">
                        <strong>Website:</strong>
                        <a href="{{ $company->url }}" target="_blank" class="text-blue">{{ $company->url }}</a>
                    </p>
                    <p class="mb-0 text-muted">Created on: {{ $company->created_at->format('d M Y') }}</p>
                </div>
            </div>

            <div class="mt-4">
                <h4>Count employees: {{ $company->employees_count }}</h4>
            </div>

            <div class="mt-4" style="display: flex; gap: 10px;">
                <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('companies.destroy', $company) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
