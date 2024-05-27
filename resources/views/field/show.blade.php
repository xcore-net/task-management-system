<x-app-layout>
    <div>
        <h1>{{ $field->name }}</h1>
        <p>{{ $field->label }}</p>
        <p>{{ $field->created_at }}</p>
        <p>{{ $field->updated_at }}</p>
    </div>
</x-app-layout>
