<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Field') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("This is Field Page!") }}
                    <x-nav-link :href="route('field.create')">
                        {{ __('Create') }}
                    </x-nav-link>
                </div>
                <div class=" w-full">
                    <table class="w-full table-auto text-left text-white">
                        <thead>
                            <tr class="text-left">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Label</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($fields as $field)
                            <tr>
                                <td>{{ $field->id }}</td>
                                <td>{{ $field->name }}</td>
                                <td>{{ $field->label }}</td>
                                <td>{{ $field->created_at }}</td>
                                <td>{{ $field->updated_at }}</td>
                                <td>
                                    <a href="{{ url('/field/' . $field->id) }}" class="btn btn-xs btn-info pull-right">View</a>
                                    <a href="{{ url('/field/' . $field->id . '/edit') }}" class="btn btn-xs btn-info pull-right">Edit</a>
                                    <!-- Delete Button -->

                                    <form method="POST" action="{{ route('field.destroy', $field->id) }}">
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
                                <td>no field</td>
                            </tr>
                            @endforelse


                        </tbody>
                    </table>



                </div>
            </div>
</x-app-layout>