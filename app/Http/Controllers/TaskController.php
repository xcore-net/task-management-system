<?php

namespace App\Http\Controllers;

use App\Models\Assignee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskType;
use App\Models\Client;
use App\Models\Document_request;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks = Task::all();
        return view("task.index", ["tasks" => $tasks]);
    }

    public function create(): View
    {
        $tasks = Task::all();
        $taskTypes = TaskType::all();
        $clients = Client::all();
        $assignees = Assignee::all();
        $documentRequests = Document_request::all();
        
        return view('task.create',[
            "tasks" => $tasks,
            "taskTypes" => $taskTypes,
            "clients" => $clients,
            "assignees" => $assignees,
            "documentRequests"=> $documentRequests
        ]);
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
    }
    public function show(string $id): View
    {
        $task = Task::findOrFail($id);

        return view('$task.show', [
            '$task' => $task,
        ]);}
    public function edit(string $id): View
    {
        $task = task::findOrFail($id);
        return view('task.create', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'client_id' => ['required'],
            'document_request_id' => ['required'],
            'task_type_id' => ['required'],
            'assignee_id' => ['required'],
            'parent_id' => ['required'],
        ]);

        $task->update([
            'name' => $request->name,
            'client_id' => $request->client_id,
            'document_request_id' => $request->document_request_id,
            'task_type_id' => $request->task_type_id,
            'assignee_id' => $request->assignee_id,
            'parent_id' => $request->parent_id,
        ]);

        return redirect(route('task.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect(route('task.index', absolute: false))->with('success', 'Task deleted successfully');
    }
}
