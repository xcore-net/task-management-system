<x-app-layout>
    <div>
        <h1>{{ $form->title }}</h1>
        <p>{{ $form->description }}</p>
        <p>{{ $form->created_at }}</p>
        <p>{{ $form->updated_at }}</p>
    </div>
    @if ($form)
        <h1>Form: {{ $form->title }}</h1>

        @if ($form->Document_type->count())
            <h2>Document Type</h2>
            <ul>
                @foreach ($form->Document_type as $Document_type)
                    <li>{{ $Document_type->title }}</li>
                @endforeach
            </ul>
        @else
            <p>This form has no document types.</p>
        @endif
    @endif
</x-app-layout>
