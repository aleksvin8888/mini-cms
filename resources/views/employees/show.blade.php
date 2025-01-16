@extends('adminlte::page')

@section('title', 'Employee Details')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>{{ $employee->first_name }} {{ $employee->last_name }}</h1>
        <a href="{{ route('employees.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Back to Employees
        </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5><strong>First Name:</strong></h5>
                    <p>{{ $employee->first_name }}</p>
                </div>
                <div class="col-md-6">
                    <h5><strong>Last Name:</strong></h5>
                    <p>{{ $employee->last_name }}</p>
                </div>
                <div class="col-md-6">
                    <h5><strong>Phone:</strong></h5>
                    <p>{{ $employee->phone }}</p>
                </div>
                <div class="col-md-6">
                    <h5><strong>Email:</strong></h5>
                    <p>{{ $employee->email }}</p>
                </div>
                <div class="col-md-6">
                    <h5><strong>Company:</strong></h5>
                    <p>{{ $employee->company->name }}</p>
                </div>
                <div class="col-md-6">
                    <h5><strong>Created on:</strong></h5>
                    <p>{{ $employee->created_at->format('d M Y') }}</p>
                </div>
            </div>

            <div class="mt-4" style="display: flex; gap: 10px;">
                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
