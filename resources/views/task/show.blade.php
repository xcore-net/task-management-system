<x-app-layout>
    <div>
        <h1>{{ $task->id }}</h1>
        <p>{{ $task->client_id }}</p>
        <p>{{ $task->document_request_id }}</p>
        <p>{{ $task->task_type_id }}</p>
        <p>{{ $task->assignee_id }}</p>
        <p>{{ $task->parent_id }}</p>
        <p>{{ $task->created_at }}</p>
        <p>{{ $task->updated_at }}</p>
    </div>
</x-app-layout>