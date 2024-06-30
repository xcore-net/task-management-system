<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Form;
use App\Models\Field;
use Illuminate\Support\Facades\Gate;

class FormController extends Controller
{

    public function index(): View
    {   $forms = Form::all();
        // $forms = Form::with('fields')->get();

        return view('form.index',["forms"=>$forms]);
    }
    /**
     * Display the create form view.
     */
    public function create(): View
    {
        //  if (auth()->user()->can('create',Form::class)){ 
        return view('form.create');
    //}
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
            'description' => ['required', 'string', 'max:255']
        ]);

        $form = Form::create([
            
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'last_updated_by'=>auth()->user()->name
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
        $form = Form::findOrFail($id);
        // $fields = Field::all();
        return view('form.create', [
            'form' => $form,
            // 'fields' => $fields,
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        
        $form = Form::findOrFail($id);
      
       // Gate::authorize('update-form', $form);


    //     if (Gate::denies('update-form', $form)) {
    //          abort(404);
    //}
    
//     if (! auth()->user()->can('update-form', $form)) {
//         abort(404);
     
//   }
// if (!Gate::allows('update-form', $form)) {
//     abort(403);
// }


//policy
if (!Gate::allows('update', $form)) {
    abort(403);
}
  
// if (!auth()->user()->can('update',Form::class))
// { abort(403);}

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            // 'fields'=>['required','array'],
        ]);

        $form->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'last_updated_by'=>auth()->user()->name
        ]);
      

        return redirect(route('form.index', absolute: false));
    }

    public function destroy(string $id): RedirectResponse
    {
        $form = Form::findOrFail($id);
        // $form->fields()->detach();
        $form->delete();
        return redirect(route('form.index', absolute: false))->with('success', 'Form deleted successfully');
    }
}
