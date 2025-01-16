@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Companies</h1>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Company List</h3>
            <div class="float-right">
                <a href="{{ route('companies.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="companiesTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Url</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>
                            <img src="{{ $company->logo }}" alt="Logo" class="img-thumbnail" style="width: 50px; height: 50px;">
                        </td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            <a href="{{ $company->url }}" target="_blank">{{ $company->url }}</a>
                        </td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <a href="{{ route('companies.show', $company) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('companies.edit', $company) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $companies->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>
@stop

@push('js')
    <script>
        $(document).ready(function () {
            $('#companiesTable').DataTable({
                paging: false,
                searching: true,
                ordering: true,
                autoWidth: false,
                responsive: true,
            });
        });
        $(document).ready(function () {
            setTimeout(function () {
                $(".alert-dismissible").alert('close');
            }, 5000);
        });
    </script>
@endpush
