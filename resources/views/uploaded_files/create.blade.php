<x-app-layout>
    <form method="POST" action="{{ isset($uploaded_file) ? route('uploaded_files.update', $uploaded_file->id) : route('uploaded_files.store') }}">
        @csrf

        <!-- If editing, add method spoofing -->
        @if(isset($uploaded_file))
        @method('PUT')
        @endif

        <!-- Client ID -->
        <div>
            <x-input-label for="uploaded_file-client_id" :value="__('Client ID')" />
            <x-text-input id="uploaded_file-client id" class="block mt-1 w-full" type="text" name="name" :value="old('name', isset($uploaded_file) ? $uploaded_file->client_id : '')" required autofocus autocomplete="client_id" />
            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
        </div>

        <!-- filled form ID -->
        <div>
            <x-input-label for="uploaded_file-filled_form_id" :value="__('Filled Form ID')" />
            <x-text-input id="uploaded_file-filled_form_id" class="block mt-1 w-full" type="text" name="filled_form_id" :value="old('filled_form_id', isset($uploaded_file) ? $uploaded_file->filled_form_id : '')" required autocomplete="filled_form_id" />
            <x-input-error :messages="$errors->get('filled_form_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ isset($uploaded_file) ? __('Update') : __('Create') }}
            </x-primary-button>
        </div>
    </form>
    <!-- Delete Button -->
    @if(isset($uploaded_file))
    <form method="POST" action="{{ route('uploaded_files.destroy', $uploaded_file->id) }}">
        @csrf
        @method('DELETE')
        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this uploaded_file?');">
            {{ __('Delete') }}
        </x-danger-button>
    </form>
    @endif
</x-app-layout>