<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Document Types') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("This is Document Type Page!") }}
                    <x-nav-link :href="route('documentType.create')">
                        {{ __('Create') }}
                    </x-nav-link>
                </div>
                <div class=" w-full">
                    <table class="text-white w-full table-auto text-left">
                        <thead>
                            <tr class="text-left">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Form id</th>
                                <th>User ID</th>
                                <th>Last Updated By</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($documentTypes as $documentType)
                            <tr>
                                <td>{{ $documentType->id }}</td>
                                <td>{{ $documentType->name }}</td>
                                <td>{{ $documentType->form_id }}</td>
                                <td>{{ $documentType->user_id }}</td>
                                <td>{{ $documentType->last_updated_by }}</td>
                                <td>{{ $documentType->created_at }}</td>
                                <td>{{ $documentType->updated_at }}</td>
                                <td>
                                    <a href="{{ url('/documentType/' . $documentType->id) }}" class="btn btn-xs btn-info pull-right">View</a>
                                    <a href="{{ url('/documentType/' . $documentType->id . '/edit') }}" class="btn btn-xs btn-info pull-right">Edit</a>
                                    <!-- Delete Button -->

                                    <form method="POST" action="{{ route('documentType.destroy', $documentType->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this document type?');">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </form>

                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td>No document types</td>
                            </tr>
                            @endforelse


                        </tbody>
                    </table>



                </div>
            </div>
</x-app-layout>
