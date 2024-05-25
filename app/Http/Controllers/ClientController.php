<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('client-manager.client-manager', ['clients' => $clients]);
    }

    public function store(Request $request)
    {
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->save();
        return response('user created.', 201);
    }

    public function destory($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect('/client')
            ->setStatusCode(204)
            ->with('status', 'user deleted.');
    }
}
