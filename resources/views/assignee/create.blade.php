<x-app-layout>
    <form method="POST" action="{{ isset($assignee) ? route('assignee.update', $assignee->id) : route('assignee.store') }}">
        @csrf
        <!-- If editing, add method spoofing -->
        @if(isset($assignee))
        @method('PUT')
        @endif

        <!-- User ID -->
        <div>
            <x-input-label for="assignee-user" :value="__('User')" />
            <select name="user_id" class="bg-transparent text-white" id="assignee-user">
                @foreach ($users as $user)
                    <option  value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ isset($assignee) ? __('Update') : __('Create') }}
            </x-primary-button>
        </div>
    </form>
    <!-- Delete Button -->
    @if(isset($assignee))
    <form method="POST" action="{{ route('assignee.destroy', $assignee->id) }}">
        @csrf
        @method('DELETE')
        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this assignee?');">
            {{ __('Delete') }}
        </x-danger-button>
    </form>
    @endif
</x-app-layout>