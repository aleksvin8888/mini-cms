<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Companies
            </h2>
            <a href="{{ route('companies.create') }}" class="ml-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table id="companiesTable" class="display table-auto w-full text-left table-spacing">
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
                                    <img src="{{ $company->logo }}" alt="Logo" class="h-12 w-12 object-cover rounded-full">
                                </td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->url }}</td>
                                <td class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('companies.show', $company) }}" class="text-blue-600 hover:underline">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('companies.edit', $company) }}" class="text-yellow-600 hover:underline">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Confirm your action')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
