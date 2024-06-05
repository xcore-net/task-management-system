<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Field;

class FieldController extends Controller
{
    public function index()
    {
        $fields = Field::all();
        return view("field.index", ["fields" => $fields]);
    }

    public function create(): View
    {
        return view('field.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'label' => ['required', 'string', 'max:100'],
        ]);

        $field = Field::create([
            'name' => $request->name,
            'label' => $request->label,
            'user_id' => auth()->user()->id,
            'last_updated_by' => auth()->user()->name
        ]);



        return redirect(route('field.index', absolute: false));
    }
    public function show(string $id): View
    {
        $field = Field::findOrFail($id);

        return view('$field.show', [
            '$field' => $field,
        ]);
    }
    public function edit(string $id): View
    {
        $field = field::findOrFail($id);
        return view('field.create', [
            'field' => $field,
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $field = Field::findOrFail($id);

        if (! Gate::allows('update-post', $field)) {
            abort(404);
        }
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'label' => ['required', 'string', 'max:100'],
            'user_id' => ['required', 'integer'],
            'last_updated_by' => ['required', 'string'],
        ]);

        $field::update([
            'name' => $request->name,
            'label' => $request->label,
            'user_id' => auth()->user()->id,
            'last_updated_by' => auth()->user()->name
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
