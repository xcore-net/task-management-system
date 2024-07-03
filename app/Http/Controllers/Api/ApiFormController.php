<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Form;
use Illuminate\Support\Facades\Http;
class ApiFormController extends Controller
{
    public function index()
    {
        //$forms = Form::all();
        //$forms = Form::with('fields')->get();
         $responses = Http::get('https://jsonplaceholder.typicode.com/posts/1')['title'];

        // $responses = Http::post('https://jsonplaceholder.typicode.com/posts', [
        //             'title' => 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit',
        //            'body '=> 'Network ',
        //             'user_id'=> 1,
           
        //         ]);
                         return response()->json($responses);

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
          //$response = Http::get('http://example.com');
        $form = Form::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id'=> $request->user_id,
            "last_updated_by"=> $request->last_updated_by
        ]);
        
    //     $responses = Http::post('https://jsonplaceholder.typicode.com/posts', [
    //         'title => 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit',
    //        'body => 'Network ',
    //         'user_id'=> 1,
   
    //     ]);
        
        //$form->fields()->sync($request->fields);
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
            //'fields'=>['required','array'],
        ]);

        $form->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id'=> $request->user_id,
             "last_updated_by"=> $request->last_updated_by
        ]);
        //$form->fields()->sync($request->fields);

        return response()->json(['form'=> $form,'message'=>'Form updated!']);
    }

    public function destroy(string $id)
    {
        $form = Form::findOrFail($id);
        $form->fields()->detach();
        $form->delete();
        return response()->json(['message'=>'Form deleted!'])->setStatusCode(201);
    }
}
