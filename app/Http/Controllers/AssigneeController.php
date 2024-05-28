<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Models\Assignee;
use App\Models\User;

class AssigneeController extends Controller
{
    public function index()
    {
        $assignees = Assignee::all();
        return view("assignee.index", ["assignees" => $assignees]);
    }

    public function create(): View
    {
        $users = User::all();
        return view('assignee.create', ['users' => $users]);
    }

    public function store(Request $request): RedirectResponse
    {
        $assignee = new Assignee();
        $request->validate([
            'user_id' => ['required', 'integer']
        ]);

        $assignee::create([
            'user_id' => $request->form_id
        ]);
        return redirect(route('assignee.index', absolute: false));
    }

    public function show(string $id): View
    {
        $assignee = Assignee::findOrFail($id);

        return view('assignee.show', [
            'assignee' => $assignee,
        ]);
    }

    public function edit(string $id): View
    {
        $assignee = Assignee::findOrFail($id);
        $users = User::all();
        return view('assignee.create', [
            'assignee' => $assignee,'users' => $users
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $assignee = Assignee::findOrFail($id);

        $request->validate([
            'user_id' => ['required', 'integer']
        ]);

        $assignee->update([
            'user_id' => $request->user_id
        ]);

        return redirect(route('assignee.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $assignee = Assignee::findOrFail($id);
        $assignee->delete();

        return redirect(route('assignee.index', absolute: false))->with('success', 'Assignee deleted successfully');
    }
}
