<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Field;
use Illuminate\Support\Facades\Gate;

class FieldController extends Controller
{

    public function index(): View
    {
        $fields = Field::all();

        return view('field.index', ["fields" => $fields]);
    }
    /**
     * Display the create field view.
     */
    public function create(): View
    {
        return view('field.create');
    }
    /**
     * Handle an incoming field request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'label' => ['required', 'string', 'max:255'],
        ]);

        Field::create([
            'name' => $request->name,
            'label' => $request->label,
            'user_id' => auth()->user()->id
        ]);



        return redirect(route('field.index', absolute: false));
    }

    public function show(string $id): View
    {
        $field = Field::findOrFail($id);

        return view('field.show', [
            'field' => $field,
        ]);
    }

    public function edit(string $id): View
    {
        $field = Field::findOrFail($id);
        return view('field.create', [
            'field' => $field,
        ]);
    }

    public function update(Request $request, Field $field, string $id): RedirectResponse
    {
        if (!Gate::allows('update-field', $field)) {
            abort(403);
        }
        $field = Field::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'label' => ['required', 'string', 'max:255'],
        ]);

        $field->update([
            'name' => $request->name,
            'label' => $request->label,
            'last_updated_by' => auth()->user()->id
        ]);

        return redirect(route('field.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $field = Field::findOrFail($id);
        $field->delete();

        return redirect(route('field.index', absolute: false))->with('success', 'Field deleted successfully');
    }
}
