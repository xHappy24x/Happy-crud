<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function indexc()
    {
        $clients = Client::orderBy('updated_at', 'DESC')->get();
        return view('clients.indexc', compact('clients'));
    }

    public function createc()
    {
        return view('clients.createc');
    }

    public function storec(Request $request)
    {
        Client::create($request->all());
 
        return redirect()->route('clients')->with('success', 'Client added successfully');
    }

    public function showc(string $id)
    {
        
        $client = Client::findorFail($id);

        return view('clients.showc', compact('client'));
    }

    public function editc(string $id)
    {
        $client = Client::findorFail($id);

        return view('clients.editc', compact('client'));
    }

    public function updatec(Request $request,string $id)
    {
        $client = Client::findorFail($id);

        $client->update($request->all());
        
        return redirect()->route('clients')->with('success', 'Client updated successfully');

    }

    public function destroyc (string $id)
    {
        $client= Client::findorFail($id);

        $client->delete();

        return redirect()->route('clients')->with('success', 'Client deleted successfully');
    }

    public function searchc()
    {
        $search_text = $_GET['query'];

        $clients = Client::where('b_name', 'LIKE', '%' .$search_text. '%')->get();

        return view ('clients.searchc', compact('clients'));
    }

    
     
}
