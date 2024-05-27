<x-app-layout>
    <form  method="POST" action="{{ isset($client) ? route('client.update', $client->id) : route('client.store') }}">
        @csrf

        <!-- If editing, add method spoofing -->
        @if(isset($client))
        @method('PUT')
        @endif

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', isset($client) ? $client->name : '')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', isset($client) ? $client->email : '')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', isset($client) ? $client->phone : '')" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Document Types -->
        <div>
            <x-input-label for="documentTypes" :value="__('Document Types')" />
            <select name="documentTypes[]" class="bg-transparent" id="documentTypes" multiple>
                @foreach ($documentTypes as $documentType)
                    <option class="text-white" value="{{ $documentType->id }}">{{ $documentType->label }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ isset($client) ? __('Update') : __('Create') }}
            </x-primary-button>
        </div>
    </form>
    <!-- Delete Button -->
    @if(isset($client))
    <form method="POST" action="{{ route('client.destroy', $client->id) }}">
        @csrf
        @method('DELETE')
        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this client?');">
            {{ __('Delete') }}
        </x-danger-button>
    </form>
    @endif
</x-app-layout>
