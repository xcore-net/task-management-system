<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class ApiTaskController extends Controller
{
    
    public function index():JsonResponse
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }
    public function show(string $id): JsonResponse
    {
        $task = Task::findOrFail($id);

        return response()->json($task);
   
    }
    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->client_id = $request->client_id;
        $task->document_request_id = $request->document_request_id;
        $task->task_type_id = $request->task_type_id;
        $task->assignee_id = $request->assignee_id;
        $task->parent_id = $request->parent_id;
        $task->save(); //save
        return response()->json(['message'=>'Task created!'])->setStatusCode(201);
    }
    public function update(Request $request, string $id): JsonResponse
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'client_id' => ['required','integer'],
            'document_request_id' => ['required','integer'],
            'task_type_id' => ['required','integer'],
            'assignee_id' => ['required','integer'],
        ]);

        $task->update([
            'name' => $request->name,
            'client_id' => $request->client_id,
            'document_request_id' => $request->document_request_id,
            'task_type_id' => $request->task_type_id,
            'assignee_id' => $request->assignee_id,
            'parent_id' => $request->parent_id,
        ]);

        return response()->json(['message'=>'Task updated!'])->setStatusCode(200);
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message'=>'Task deleted!'])->setStatusCode(204);
    }
}
