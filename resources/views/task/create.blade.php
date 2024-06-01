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
        <div>
            <x-input-label for="task-client_id" :value="__('Client_id')" />
            <x-text-input id="task-client_id" class="block mt-1 w-full" type="text" name="client_id" :value="old('client_id', isset($task) ? $task->client_id : '')" required autocomplete="client_id" />
            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
        </div>
        <!-- Document_request_id -->
        <div>
            <x-input-label for="task-document_request_id" :value="__('Document_request_id')" />
            <x-text-input id="task-document_request_id" class="block mt-1 w-full" type="text" name="document_request_id" :value="old('document_request_id', isset($task) ? $task->document_request_id : '')" required autocomplete="document_request_id" />
            <x-input-error :messages="$errors->get('document_request_id')" class="mt-2" />
        </div>
        <!-- Task_type_id -->
        <div>
            <x-input-label for="task-task_type_id" :value="__('Task_type_id')" />
            <x-text-input id="task-task_type_id" class="block mt-1 w-full" type="text" name="task_type_id" :value="old('task_type_id', isset($task) ? $task->task_type_id : '')" required autocomplete="task_type_id" />
            <x-input-error :messages="$errors->get('task_type_id')" class="mt-2" />
        </div>
        <!-- Assignee_id -->
        <div>
            <x-input-label for="task-assignee_id" :value="__('Assignee_id')" />
            <x-text-input id="task-assignee_id" class="block mt-1 w-full" type="text" name="assignee_id" :value="old('assignee_id', isset($task) ? $task->assignee_id : '')" required autocomplete="assignee_id" />
            <x-input-error :messages="$errors->get('assignee_id')" class="mt-2" />
        </div>
        <!-- Parent_id -->
        <div>
            <x-input-label for="task-parent_id" :value="__('Parent_id')" />
            <x-text-input id="task-parent_id" class="block mt-1 w-full" type="text" name="parent_id" :value="old('parent_id', isset($task) ? $task->parent_id : '')" required autocomplete="parent_id" />
            <x-input-error :messages="$errors->get('parent_id')" class="mt-2" />
        </div>

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