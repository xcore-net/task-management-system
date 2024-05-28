<x-app-layout>
    <form  method="POST" action="{{ isset($form) ? route('form.update', $form->id) : route('form.store') }}">
        @csrf

        <!-- If editing, add method spoofing -->
        @if(isset($form))
        @method('PUT')
        @endif

        <!-- Title -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', isset($form) ? $form->title : '')" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Description -->
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', isset($form) ? $form->description : '')" required autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div>
        <x-input-label for="form-fields" :value="__('Fields')" />
            <select name="fields[]" class="bg-transparent" id="form-fields" multiple>
                @foreach ($fields as $field)
                    <option class="text-white" value="{{ $field->id }}">{{ $field->label }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ isset($form) ? __('Update') : __('Create') }}
            </x-primary-button>
        </div>
    </form>
    <!-- Delete Button -->
    @if(isset($form))
    <form method="POST" action="{{ route('form.destroy', $form->id) }}">
        @csrf
        @method('DELETE')
        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this form?');">
            {{ __('Delete') }}
        </x-danger-button>
    </form>
    @endif
</x-app-layout>