<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Field;

class ApiFieldController extends Controller
{
    public function index()
    {
        $fields = Field::all();
        return response()->json($fields);
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'label' => ['required', 'string', 'max:100'],
        ]);

        $field = Field::create([
            'name' => $request->name,
            'label' => $request->label,
             'user_id' => 3,
            'last_updated_by' => 'shahd'
        ]);



        return response()->json(['massege'=>'field created successfully']);
    }
    public function show(string $id)
    {
        $field = Field::findOrFail($id);

        return response()->json($field);
        
    }

    public function update(Request $request, string $id)
    {
        $field = Field::findOrFail($id);

        
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'label' => ['required', 'string', 'max:100'],
            // 'user_id' => ['required', 'integer'],
            // 'last_updated_by' => ['required', 'string'],
        ]);

        $field->update([
            'name' => $request->name,
            'label' => $request->label,
            // 'user_id' => auth()->user()->id,
            // 'last_updated_by' => auth()->user()->name
        ]);

        return response()->json(['message'=>'Form updated successfully',201]);
        
    }

    public function destroy(string $id)
    {
        $field = Field::findOrFail($id);
        $field->delete();

        return response()->json(['message'=>'Form deleted successfully',201]);
    }
}
