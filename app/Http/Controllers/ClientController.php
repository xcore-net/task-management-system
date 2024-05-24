<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

// For custom validation rules

class ClientController extends Controller
{
    public function index(): View
    {
        $clients = clients::all();
        return view('clients.index', ['clients' => $clients]);
    }


}
