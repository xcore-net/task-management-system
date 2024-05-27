<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class FieldController extends Controller
{
    public function index(): View
    {
        $field = Field::all();

        return view('field.index', ['fields' => $field]);
    }

    public function create(): View
    {
        return view('field.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'label' => ['required', 'string', 'max:255'],
        ]);

        Field::create([
            'name' => $request->name,
            'label' => $request->label,
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
    public function update(Request $request, string $id): RedirectResponse
    {
        $field = Field::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'label' => ['required', 'string', 'max:255'],
        ]);

        $field->update([
            'name' => $request->name,
            'label' => $request->label,
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
