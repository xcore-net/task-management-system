<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;

class ApiFormController extends Controller
{
    public function index()
    {
        $forms = Form::with('fields')->get();

        return response()->json($forms);
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
            'description' => ['required', 'string', 'max:255']
        ]);

        $form = Form::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id'=> $request->user_id,
            "last_updated_by"=> $request->last_updated_by
        ]);
        
        $form->fields()->sync($request->fields);
       return response()->json(['message'=>'Form Created!'])->setStatusCode(201);
    }

    public function show(string $id)
    {
        $form = Form::findOrFail($id);

        return response()->json($form);
    }

    public function update(Request $request, string $id)
    {
        $form = Form::findOrFail($id);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'fields'=>['required','array'],
        ]);

        $form->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id'=> $request->user_id,
            "last_updated_by"=> $request->last_updated_by
        ]);
        $form->fields()->sync($request->fields);

        return response()->json(['message'=>'Form updated!'])->setStatusCode(201);
    }

    public function destroy(string $id)
    {
        $form = Form::findOrFail($id);
        $form->fields()->detach();
        $form->delete();
        return response()->json(['message'=>'Form deleted!'])->setStatusCode(201);
    }
}
