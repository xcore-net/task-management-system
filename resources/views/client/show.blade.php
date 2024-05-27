<x-app-layout>
    <div>
        <h1>{{ $client->name }}</h1>
        <p>{{ $client->label }}</p>
        <p>{{ $client->created_at }}</p>
        <p>{{ $client->updated_at }}</p>
    </div>
    @if ($client)
        <h1>Client: {{ $client->name }}</h1>

        @if ($client->docReqs->count())
            <h2>Document Requests</h2>
            <ul>
                @foreach ($client->docReqs as $docReq)
                    <li>{{ $docReq->title }}</li>
                @endforeach
            </ul>
        @else
            <p>This client has no document requests.</p>
        @endif
    @endif
</x-app-layout>
