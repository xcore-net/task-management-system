<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Uploded Files') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("This is Uploded_files Page!") }}
                    <x-nav-link :href="route('uploded_files.create')">
                        {{ __('Create') }}
                    </x-nav-link>
                </div>
                <div class=" w-full">
                    <table class="w-full table-auto text-left text-white">
                        <thead>
                            <tr class="text-left">
                                <th>ID</th>
                                <th>Client ID</th>
                                <th>Filled Form ID</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($uploded_filess as $uploded_files)
                            <tr>
                                <td>{{ $uploded_files->id }}</td>
                                <td>{{ $uploded_files->client_id }}</td>
                                <td>{{ $uploded_files->filled_form_id }}</td>
                                <td>{{ $uploded_files->created_at }}</td>
                                <td>{{ $uploded_files->updated_at }}</td>
                                <td>
                                    <a href="{{ url('/uploded_files/' . $uploded_files->id) }}" class="btn btn-xs btn-info pull-right">View</a>
                                    <a href="{{ url('/uploded_files/' . $uploded_files->id . '/edit') }}" class="btn btn-xs btn-info pull-right">Edit</a>
                                    <!-- Delete Button -->

                                    <form method="POST" action="{{ route('uploded_files.destroy', $uploded_files->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this form?');">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </form>

                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td>no uploded_files</td>
                            </tr>
                            @endforelse


                        </tbody>
                    </table>



                </div>
            </div>
</x-app-layout>