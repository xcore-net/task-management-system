<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Field;
use Illuminate\Support\Facades\Gate;

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
            // 'user_id' => auth()->user()->id,s
            // 'last_updated_by'=>auth()->user()->name
        ]);
        
        $form->fields()->sync($request->fields);
        return response()->json(['message'=>'Form created successfully',201]);
    }

    public function show($id)
    {
        $form = Form::findOrFail($id);

        return response()->json($form);
       
    }

   

    public function update(Request $request, string $id)
    {
        
        $form = Form::findOrFail($id);

        Gate::authorize('update', $form);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'fields'=>['required','array'],
        ]);

        $form->update([
            'title' => $request->title,
            'description' => $request->description,
            // 'user_id' => auth()->user()->id,
            // 'last_updated_by'=>auth()->user()->name
        ]);
        $form->fields()->sync($request->fields);

        return response()->json(['message'=>'Form updated successfully',201]);    }

    public function destroy(string $id)
    {
        $form = Form::findOrFail($id);
        $form->fields()->detach();
        $form->delete();
        return response()->json(['message'=>'Form deleted successfully',201]);    }
}
