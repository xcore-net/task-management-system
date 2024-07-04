<x-app-layout>
    <form method="POST" action="{{ isset($form) ? route('form.update', $form->id) : route('form.store') }}">
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



        <!-- Dynamic Form Fields -->
        <div id="dynamic-form-fields">
            @foreach($formfields as $index => $formfield)
            <div class="dynamic-field" data-index="{{ $index }}">
                <x-input-label for="field_{{ $index }}" :value="'Field ' . ($index + 1)" />
                <x-text-input id="field_{{ $index }}" class="block mt-1 w-full" type="text" name="formfields[{{ $index }}][field_id]" value="{{ old('formfields.' . $index . '.field_id', $formfield['field_id']) }}" required />
                <input type="hidden" name="formfields[{{ $index }}][form_id]" value="{{ old('formfields.' . $index . '.form_id', $formfield['form_id']) }}" />
                <x-input-error :messages="$errors->get('formfields.' . $index . '.field_id')" class="mt-2" />
                <button type="button" class="remove-field" onclick="removeField(this)">Remove</button>
            </div>
            @endforeach
        </div>

        <button type="button" id="add-field-button">Add Field</button>

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

    <!-- JavaScript to handle adding/removing fields -->
    <script>
        document.getElementById('add-field-button').addEventListener('click', function() {
            addField();
        });

        function addField() {
            const index = document.querySelectorAll('.dynamic-field').length;
            const container = document.getElementById('dynamic-form-fields');
            const newField = document.createElement('div');
            newField.classList.add('dynamic-field');
            newField.setAttribute('data-index', index);
            newField.innerHTML = `
                <div>
                    <label for="field_${index}">Field ${index + 1}</label>
                    <input id="field_${index}" class="block mt-1 w-full" type="text" name="formfields[${index}][field_id]" required />
                    <input type="hidden" name="formfields[${index}][form_id]" value="0" />
                    <button type="button" class="remove-field" onclick="removeField(this)">Remove</button>
                </div>
            `;
            container.appendChild(newField);
        }

        function removeField(button) {
            const field = button.closest('.dynamic-field');
            field.remove();
        }
    </script>
</x-app-layout>