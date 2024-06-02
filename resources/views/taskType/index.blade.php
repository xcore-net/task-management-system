<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task Type') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("This is taskType Page!") }}
                    <x-nav-link :href="route('taskType.create')">
                        {{ __('Create') }}
                    </x-nav-link>
                </div>
                <div class=" w-full">
                    <table class="text-white w-full table-auto text-left">
                        <thead>
                            <tr class="text-left">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Assignees</th>
                                <th>User ID</th>
                                <th>Last Updated By</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($taskTypes as $taskType)`
                            <tr>
                                <td>{{ $taskType->id }}</td>
                                <td>{{ $taskType->name }}</td>
                                <td>{{ $taskType->user_id }}</td>
                                <td>{{ $taskType->last_updated_by }}</td>
                                <td><select id="um-hassan">
                                        @foreach ($taskType->assignees as $assignee)
                                        <option value="{{ $assignee->id }}">{{ $assignee->id }}</option>
                                        @endforeach
                                    </select></td>

                                <td>{{ $taskType->created_at }}</td>
                                <td>{{ $taskType->updated_at }}</td>
                                <td>
                                    <a href="{{ url('/taskType/' . $taskType->id) }}" class="btn btn-xs btn-info pull-right">View</a>
                                    <a href="{{ url('/taskType/' . $taskType->id . '/edit') }}" class="btn btn-xs btn-info pull-right">Edit</a>
                                    <!-- Delete Button -->

                                    <form method="POST" action="{{ route('taskType.destroy', $taskType->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this taskType?');">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </form>

                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td>No taskTypes</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
</x-app-layout>