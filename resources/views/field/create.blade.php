<x-app-layout>
    <form method="POST" action="{{ isset($field) ? route('field.update', $field->id) : route('field.store') }}">
        @csrf

        <!-- If editing, add method spoofing -->
        @if(isset($field))
        @method('PUT')
        @endif

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', isset($field) ? $field->name : '')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Label -->
        <div>
            <x-input-label for="label" :value="__('Label')" />
            <x-text-input id="label" class="block mt-1 w-full" type="text" name="label" :value="old('label', isset($field) ? $field->label : '')" required autocomplete="label" />
            <x-input-error :messages="$errors->get('label')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ isset($field) ? __('update') : __('Create') }}
            </x-primary-button>
        </div>
    </form>
    <!-- Delete Button -->
    @if(isset($field))
    <form method="POST" action="{{ route('field.destroy', $field->id) }}">
        @csrf
        @method('DELETE')
        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this field?');">
            {{ __('Delete') }}
        </x-danger-button>
    </form>
    @endif
</x-app-layout>