<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('field.store') }}">
        @csrf


        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="label" :value="__('label')" />
            <x-text-input id="label" class="block mt-1 w-full" type="text" name="label" :value="old('label')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('label')" class="mt-2" />
        </div>



            <x-primary-button class="ms-3" action="{{route('field.store')}}">
                {{ __('Create') }}
            </x-primary-button>

    </form>
</x-guest-layout>
