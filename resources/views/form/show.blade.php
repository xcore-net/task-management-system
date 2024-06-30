<x-app-layout>
    <div >
        <h1>{{ $form->title }}</h1>
        <p>{{ $form->description }}</p> 
        <p>{{ $form->user_id }}</p>
        <p>{{ $form->last_updated_by }}</p>
      
        <p>{{ $form->created_at }}</p>
        <p>{{ $form->updated_at }}</p>
    </div>
</x-app-layout>