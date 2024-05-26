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
        $fields = Field::all();
        return view('field.index', ['fields' => $fields]);
    }

    public function create(): View
    {
        return view('field.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lable' => 'required|string|email|unique:clients,email', // Unique email validation
        ]);

        $field = Field::create($request->all());

        return redirect()->route('field.index')->with('success', 'Client created successfully!');

    }

}
