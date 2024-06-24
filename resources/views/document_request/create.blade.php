<x-app-layout>
    <form method="POST" action="{{ isset($document_request) ? route('document_request.update', $document_request->id) : route('document_request.store') }}">
        @csrf

        <!-- If editing, add method spoofing -->
        @if(isset($document_request))
        @method('PUT')
        @endif

         <!-- Document Type -->
         <div>
            <x-input-label for="doc-request-form" :value="__('Document Type')" />
            <select name="document_type_id" class="bg-transparent text-white" id="doc-request-form">
                @foreach ($documentTypes as $documentType)
                    <option  value="{{ $documentType->id }}">{{ $documentType->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('document_type_id')" class="mt-2" />
        </div>
        
        <!-- Client -->
         <div>
            <x-input-label for="client-form" :value="__('Client')" />
            <select name="client_id" class="bg-transparent text-white" id="client-form">
                @foreach ($clients as $client)
                    <option  value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ isset($document_request) ? __('Update') : __('Create') }}
            </x-primary-button>
        </div>
    </form>
    <!-- Delete Button -->
    @if(isset($document_request))
    <form method="POST" action="{{ route('document_request.destroy', $document_request->id) }}">
        @csrf
        @method('DELETE')
        <x-danger-button class="mt-4" onclick="return confirm('Are you sure you want to delete this document_request?');">
            {{ __('Delete') }}
        </x-danger-button>
    </form>
    @endif
</x-app-layout>
