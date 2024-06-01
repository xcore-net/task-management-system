<x-app-layout>
    <div class="text-white">
        <h1>{{ $form->title }}</h1>
        <p>{{ $form->description }}</p>
        @foreach ($form->fields as $field )
         <p>{{ $form->field }}</p>
        @endforeach
       
        <p>{{ $form->created_at }}</p>
        <p>{{ $form->updated_at }}</p>
    </div>
</x-app-layout>