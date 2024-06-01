<x-app-layout>
    <div>
        <h1>{{ $uploded_files->client_id }}</h1>
        <p>{{ $uploded_files->filled_from_id }}</p>
        <p>{{ $uploded_files->created_at }}</p>
        <p>{{ $uploded_files->updated_at }}</p>
    </div>
</x-app-layout>