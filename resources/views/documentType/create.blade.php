<x-app-layout>
    <form  method="POST" action="{{ isset($documentType) ? route('documentType.update', $documentType->id) : route('documentType.store') }}">
        @csrf

        <!-- If editing, add method spoofing -->
        @if(isset($documentType))
        @method('PUT')
        @endif

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', isset($documentType) ? $documentType->name : '')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Form -->
        <div>
            <x-input-label for="forms" :value="__('Form')" />
            <select name="forms" class="bg-transparent text-white" id="forms">
                @foreach ($forms as $form)
                    <option  value="{{ $form->id }}">{{ $form->title }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('form')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ isset($documentType) ? __('Update') : __('Create') }}
            </x-primary-button>
        </div>
    </form>
    <!-- Delete Button -->
    @if(isset($documentType))
    <form method="POST" action="{{ route('documentType.destroy', $documentType->id) }}">
        @csrf
        @method('DELETE')
        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this document type?');">
            {{ __('Delete') }}
        </x-danger-button>
    </form>
    @endif
</x-app-layout>
