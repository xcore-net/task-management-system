<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assignee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\TaskType;


class TaskTypeController extends Controller
{

    public function index(): View
    {
        $taskTypes = TaskType::with('assignees')->get();

        return view('taskType.index', ['taskTypes' => $taskTypes]);
    }
    /**
     * Display the create TaskTypes view.
     */
    public function create(): View
    {
        $assignees = Assignee::all();
        return view('taskType.create', ['assignees' => $assignees]);
    }
    /**
     * Handle an incoming TaskType request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'assignees' => ['required', 'array'],
        ]);

        $taskTypes = TaskType::create([
            'name' => $request->name,
            'assignees' => $request->assignees,
            'user_id' => auth()->user()->id,
            'last_updated_by' => auth()->user()->name
        ]);

        $taskTypes->assignees()->sync($request->assignees);
        return redirect(route('taskType.index', absolute: false));
    }

    public function show(string $id): View
    {
        $taskTypes = TaskType::findOrFail($id);

        return view('TaskType.show', [
            'TaskTypes' => $taskTypes,
        ]);
    }

    public function edit(string $id): View
    {
        $taskType = TaskType::findOrFail($id);
        $assignees = Assignee::all();
        return view('taskType.create', [
            'taskType' => $taskType,
            'assignees' => $assignees
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
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
            'user_id' => auth()->user()->id,
            'last_updated_by' => auth()->user()->name
        ]);
        $taskTypes->assignees()->sync($request->assignees);

        return redirect(route('taskType.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $taskTypes = TaskType::findOrFail($id);
        $taskTypes->assignees()->detach();
        $taskTypes->delete();

        return redirect(route('taskType.index', absolute: false))->with('success', 'Task Type deleted successfully');
    }
}
