<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("This is Task Page!") }}
                    <x-nav-link :href="route('task.create')">
                        {{ __('Create') }}
                    </x-nav-link>
                </div>
                <div class=" w-full">
                    <table class="w-full table-auto text-left text-white">
                        <thead>
                            <tr class="text-left">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Client ID</th>
                                <th>Document Request ID</th>
                                <th>Task Type ID</th>
                                <th>Assignee ID</th>
                                <th>Parent ID</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->client_id }}</td>
                                <td>{{ $task->document_request_id }}</td>
                                <td>{{ $task->task_type_id }}</td>
                                <td>{{ $task->assignee_id }}</td>
                                <td>{{ $task->parent_id }}</td>
                                <td>{{ $task->created_at }}</td>
                                <td>{{ $task->updated_at }}</td>
                                <td>
                                    <a href="{{ url('/task/' . $task->id) }}" class="btn btn-xs btn-info pull-right">View</a>
                                    <a href="{{ url('/task/' . $task->id . '/edit') }}" class="btn btn-xs btn-info pull-right">Edit</a>
                                    <!-- Delete Button -->

                                    <form method="POST" action="{{ route('task.destroy', $task->id) }}">
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
                                <td>no task</td>
                            </tr>
                            @endforelse


                        </tbody>
                    </table>



                </div>
            </div>
</x-app-layout>