<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $employee->first_name }} {{ $employee->last_name }}
            </h2>
            <a href="{{ route('employees.index') }}" class="ml-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back to Employees
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-bold">First Name</h3>
                            <p>{{ $employee->first_name }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold">Last Name</h3>
                            <p>{{ $employee->last_name }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold">Phone</h3>
                            <p>{{ $employee->phone }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold">Email</h3>
                            <p>{{ $employee->email }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold">Company</h3>
                            <p>{{ $employee->company->name }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold">Created on:</h3>
                            <p>{{ $employee->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('employees.edit', $employee) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

