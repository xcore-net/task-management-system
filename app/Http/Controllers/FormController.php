<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Field;

class FormController extends Controller
{

    public function index(): View
    {
        $forms = Form::with('fields')->get();

        return view('Form.index', compact('forms'));
    }
    /**
     * Display the create form view.
     */
    public function create(): View
    {
           $fields = Field::all();
        return view('Form.create', compact('fields'));
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

        $form = Form::create([
            
            'title' => $request->title,
            'description' => $request->description,
        ]);
        
        $form->fields()->sync($request->fields);
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
        $form = Form::findOrFail($id);
        $fields = Field::all();
        return view('form.create', [
            'form' => $form,
            'fields' => $fields,
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $form = Form::findOrFail($id);
        $fields = Field::all();
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'fields'=>['required','array']
        ]);

        $form->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $form->fields()->sync($request->fields);

        return redirect(route('form.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $form = Form::findOrFail($id);
        $form->fields()->detach();
        $form->delete();

        return redirect(route('form.index', absolute: false))->with('success', 'Form deleted successfully');
    }
}
