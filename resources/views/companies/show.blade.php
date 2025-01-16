
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
{{ $company->name }}
</h2>
<a href="{{ route('companies.index') }}" class="ml-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Back to Companies
</a>
</div>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex items-center space-x-6">
                    <div class="h-24 w-24">
                        <img src="{{ $company->logo }}" alt="Logo"class="h-full w-full object-cover rounded-full">
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold">{{ $company->name }}</h3>
                        <p class="text-sm text-blue-500">{{ $company->email }}</p>
                        <p class="text-sm text-blue-500">
                            <a href="{{ $company->url }}" target="_blank" class="text-blue-500 hover:underline">{{ $company->url }}</a>
                        </p>
                        <p class="text-sm text-gray-500">
                            Created on: {{ $company->created_at->format('d M Y') }}
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <h4 class="text-lg font-semibold">Count employees {{ $company->employees_count }}</h4>
                </div>

                <div class="mt-6 flex space-x-4">
                    <a href="{{ route('companies.edit', $company) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Edit
                    </a>
                    <form action="{{ route('companies.destroy', $company) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
