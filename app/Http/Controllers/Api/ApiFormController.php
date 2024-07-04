<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Http;

class ApiFormController extends Controller
{

    public function index()
    {
        // $forms = Form::all();
        $forms = Http::get('http://example.com/forms');
        return response()
            ->json(['forms' => $forms, 'message' => 'found']);
    }

    /**
     * Handle an incoming form request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);


        Form::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()
            ->json(['message' => 'Form created successfully!'], 201);
    }

    public function show(string $id)
    {
        $form = Form::findOrFail($id);
        return response()
            ->json(['form' => $form]);
    }



    public function update(Request $request, string $id)
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
        return response()
            ->json(['message' => 'Form updated successfully!'], 201);
    }

    public function destroy(string $id)
    {
        $form = Form::findOrFail($id);
        $form->delete();

        return response()
            ->json(['message' => 'Form deleted successfully!'], 201);
    }
}
