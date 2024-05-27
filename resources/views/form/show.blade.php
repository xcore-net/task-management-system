<x-app-layout>
    <div>
        <h1>{{ $form->title }}</h1>
        <p>{{ $form->description }}</p>
        <p>{{ $form->created_at }}</p>
        <p>{{ $form->updated_at }}</p>
    </div>
</x-app-layout>