<x-app-layout>
    <form  method="POST" action="{{ isset($taskType) ? route('taskType.update', $taskType->id) : route('taskType.store') }}">
        @csrf

        <!-- If editing, add method spoofing -->
        @if(isset($taskType))
        @method('PUT')
        @endif

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', isset($taskType) ? $taskType->name : '')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Assignees -->
        <div>
            <x-input-label for="assignees" :value="__('Assignees')" />
            <select name="assignees[]" class="bg-transparent" id="assignees" multiple>
                @foreach ($assignees as $assignee)
                    <option class="text-white" value="{{ $assignee->id }}">{{ $assignee->id }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ isset($taskType) ? __('Update') : __('Create') }}
            </x-primary-button>
        </div>
    </form>
    <!-- Delete Button -->
    @if(isset($taskType))
    <form method="POST" action="{{ route('taskType.destroy', $taskType->id) }}">
        @csrf
        @method('DELETE')
        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this Task type?');">
            {{ __('Delete') }}
        </x-danger-button>
    </form>
    @endif
</x-app-layout>
