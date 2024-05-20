<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="jumbotron text-center">
                        <h1 class="display-4">{{ __('Welcome to My Laravel App!') }}</h1>
                        <p class="lead">{{ __('This is a simple Laravel application.') }}</p>
                        <hr class="my-4">
                        <p>{{ __('Click the button below to learn more.') }}</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">{{ __('Learn more') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
