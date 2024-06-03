<x-app-layout>
    <form method="POST" action="{{ isset($task) ? route('task.update', $task->id) : route('task.store') }}">
        @csrf

        <!-- If editing, add method spoofing -->
        @if(isset($task))
        @method('PUT')
        @endif

        <!-- Name -->
        <div>
            <x-input-label for="task-name" :value="__('Name')" />
            <x-text-input id="task-name" class="block mt-1 w-full" type="text" name="name" :value="old('name', isset($task) ? $task->name : '')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- client_id -->
        <x-input-label for="client-id" :value="__('Client ID')" />
        <select name="client_id" class="bg-transparent" id="client-id">
            @foreach ($clients as $client)
            <option class="text-white" value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>
        <!-- Document_request_id -->
        <x-input-label for="document-request-id" :value="__('Document Request ID')" />
        <select name="document_request_id" class="bg-transparent" id="document-request-id">
            @foreach ($documentRequests as $request)
            <option class="text-white" value="{{ $request->id }}">{{ $request->name }}</option>
            @endforeach
        </select>

        <!-- Task_type_id -->
        <x-input-label for="task-type-id" :value="__('Task Type ID')" />
        <select name="task_type_id" class="bg-transparent" id="task-type-id">
            @foreach ($taskTypes as $type)
            <option class="text-white" value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        <!-- Assignee_id -->
        <x-input-label for="assignee-id" :value="__('Assignee ID')" />
        <select name="assignee_id" class="bg-transparent" id="assignee-id">
            @foreach ($assignees as $assignee)
            <option class="text-white" value="{{ $assignee->id }}">{{ $assignee->name }}</option>
            @endforeach
        </select>
        <!-- Parent_id -->
        <x-input-label for="task-parent-id" :value="__('Task Parent ID')" />
        <select name="task_parent_id" class="bg-transparent" id="task-parent-id">
            @foreach ($tasks as $task)
            <option class="text-white" value="{{ $task->id }}">{{ $task->name }}</option>
            @endforeach
        </select>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ isset($task) ? __('Update') : __('Create') }}
            </x-primary-button>
        </div>
    </form>
    <!-- Delete Button -->
    @if(isset($task))
    <form method="POST" action="{{ route('task.destroy', $task->id) }}">
        @csrf
        @method('DELETE')
        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this task?');">
            {{ __('Delete') }}
        </x-danger-button>
    </form>
    @endif
</x-app-layout>