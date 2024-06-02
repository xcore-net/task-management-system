<x-app-layout>
    <div class="text-white">
        <h1>{{ $form->title }}</h1>
        <p>{{ $form->description }}</p> 
        <p>{{ $form->user_id }}</p>
        <p>{{ $form->last_updated_by }}</p>
        @foreach ($form->fields as $field )
         <p>{{ $form->field }}</p>
        @endforeach
       
        <p>{{ $form->created_at }}</p>
        <p>{{ $form->updated_at }}</p>
    </div>
</x-app-layout>