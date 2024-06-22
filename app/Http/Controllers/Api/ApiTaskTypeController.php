<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assignee;
use Illuminate\Http\Request;
use App\Models\TaskType;
use Illuminate\Http\JsonResponse;


class ApiTaskTypeController extends Controller
{

    public function index():JsonResponse
    {
        $taskTypes = TaskType::with('assignees')->get();

        return response()->json($taskTypes);
    }
    /**
     * Handle an incoming TaskType request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'assignees' => ['required', 'array'],
        ]);

        $taskTypes = TaskType::create([
            'name' => $request->name,
            'assignees' => $request->assignees,
            'user_id' => $request->user_id,
            'last_updated_by' => $request->last_updated_by
        ]);

        $taskTypes->assignees()->sync($request->assignees);
        return response()->json(['message'=>'Task type Created!'])->setStatusCode(201);
    }

    public function show(string $id): JsonResponse
    {
        $taskType = TaskType::findOrFail($id);

        return response()->json($taskType);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $taskTypes = TaskType::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'assignees' => ['required', 'array'],
        ]);
        $taskTypes->assignees()->sync($request->assignees);
        $taskTypes->update([
            'name' => $request->name,
            'assignees' =>  $request->assignees,
            'user_id' => $request->user_id,
            'last_updated_by' => $request->last_updated_by
        ]);
        $taskTypes->assignees()->sync($request->assignees);

        return response()->json(['message'=>'Task type updated!'])->setStatusCode(200);
    }

    public function destroy(string $id): JsonResponse
    {
        $taskTypes = TaskType::findOrFail($id);
        $taskTypes->assignees()->detach();
        $taskTypes->delete();

        return response()->json(['message'=>'Task type deleted!'])->setStatusCode(204);
    }
}
