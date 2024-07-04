<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Field;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{

    public function index(): View
    {
        $forms = Form::all();

        return view('form.index', ["forms" => $forms]);
    }
    /**
     * Display the create form view.
     */
    public function create(): View
    {
        $fields = Field::all();
        $formfields = [];
        return view('form.create', ['fields' => $fields, 'formfields' => $formfields]);
    }
    /**
     * Handle an incoming form request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        Form::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect(route('form.index', absolute: false));
    }

    public function show(string $id): View
    {
        $form = Form::findOrFail($id);

        return view('form.show', [
            'form' => $form,
        ]);
    }

    public function edit(string $id): View
    {
        $fields = Field::all();
        $form = Form::findOrFail($id);
        return view('form.create', [
            'form' => $form,
            'fields' => $fields
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $form = Form::findOrFail($id);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $form->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        // $request->formfields
        return redirect(route('form.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $form = Form::findOrFail($id);
        $form->delete();

        return redirect(route('form.index', absolute: false))->with('success', 'Form deleted successfully');
    }
}
