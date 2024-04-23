<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Client;
use App\Models\Product;

class QuotationController extends Controller
{
    public function indexq()
    {
        $quotations = Quotation::with('clients', 'products')->get();
        
        $quotations = Quotation::orderBy('created_at', 'DESC')->get();
         //return ['data' => $quotations[0]];
        // dd($quotations[0]);
        // $data = Quotation::join('clients', 'clients.id', '=', 'quotations.id')
        //                     ->join('products', 'products.id', '=', 'products.id')
        //                     ->get(['clients.b_name', 'products.p_name']);

                            

        
        
        return view('quotations.indexq', compact('quotations'));
    }

    public function createq()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('quotations.createq', compact('clients', 'products'));
    }

    public function storeq(Request $request)
{
    $validatedData = $request->validate([
        'client_id'=> 'required|exists:clients,id',
        'product_id'=> 'required|array',
        'product_id.*'=> 'exists:products,id',
        'rfq'=> 'required',
        'q_date'=> 'required',
        's_detail'=> 'required',
        'ss_number'=> 'nullable',
        'model'=> 'nullable',
        's_number'=>'nullable'
    ]);

    // Find the client
    $client = Client::findOrFail($request->input("client_id"));

    $productIds = $request->input('product_id');

foreach ($productIds as $productId) {
    // Create a new quotation instance
    $quotation = new Quotation;

    $quotation->client_id = $request->input('client_id');
    $quotation->product_id = $productId; // Use the current product ID from the loop iteration
    $quotation->rfq = (string) $request->input('rfq');
    $quotation->q_date = (string) $request->input('q_date');
    $quotation->s_detail = (string) $request->input('s_detail');
    $quotation->ss_number = (string) $request->input('ss_number');
    $quotation->model = (string) $request->input('model');
    $quotation->s_number = (string) $request->input('s_number');

    // Save the quotation
    $quotation->save();
}
   

    // Attach products to the quotation
    // foreach ($request->input('product_id') as $productId) {
    //     $product = Product::findOrFail($productId);
    //     // Create a new related record for each product
    //     $quotation->products()->create([
    //         'p_name' => $product->p_name,
    //         'qty' => 1,
    //         'p_number' =>$request->input('p_number'),
    //         'description' =>'nullable',
    //         'price'=> $request->input('price'),
    //          // Assuming default quantity is 1, adjust as needed
    //         // Add other fields as needed
    //     ]);
    // }

    $productIds = $request->input('product_id');

    // Create related product records for each product ID
    foreach ($productIds as $productId) {
        $product = Product::findOrFail($productId);

        // Ensure that p_number is provided before creating the related record
        if ($request->filled('p_number')) {
            // Create the related product record with necessary fields
            $quotation->products()->create([
                'p_number' => $request->input('p_number'),
                // Assign other attributes as needed
            ]);
        } else {
            // Handle the case where p_number is missing or empty
            // You can return an error response or handle it according to your application logic
        }
    }

    return redirect('quotations')->with('success', 'Quotation added successfully');
}


    public function showq(string $id)
    {
        $clients = Client::all();
        $products = Product::all();
        $quotations = Quotation::with('clients', 'products')->get();
        
        $quotation= Quotation::findOrFail($id);

        return view ('quotations.showq', compact('quotation'));
    }

    public function editq(string $quotation)
    {
        $quotation = Quotation::findOrFail($quotation);

        $clients = Client::all();
        $products = Product::all();


        return view('quotations.editq', compact('clients', 'products', 'quotation'));
    }

    public function updateq(Request $request,$quotation)
    {
        // $client = Client::findOrFail($request->input("client_id"))->quotations()->where('id',$quotation)->first();
        // $product = Product::findOrFail($request->input("product_id"))->quotations()->where('id',$quotation)->first();
        $client = Client::findOrFail($request->input("client_id"));
        $product = Product::findOrFail($request->input("product_id"));

        $productId = $request->input('product_id');
        $price = $request->input('price');
        $newQuantity = $request->input('qty');

        $product->price = $price;
        $product->qyt = $newQuantity;

        $product->save();

        
        $quotation = Quotation::findOrFail($quotation);
        $quotation->update($request->all());

        return redirect('quotations')->with('success', 'Client added successfully');
    }

    public function destroyq(string $id)
    {
        $quotation = Quotation::findOrFail($id);

        $quotation->delete();

        return redirect()->route('quotations')->with('success', 'quotation deleted successfully');
    }

    public function view(string $id)
    {
        $quotation = Quotation::findOrFail($id);
        return view('quotations.view');
    }

    public function searchq()
    {
        
        $search_text = $_GET['query'];

        $quotations = Quotation::where('rfq', 'LIKE', '%' .$search_text. '%')->get();
       

        return view ('quotations.searchq', compact('quotations'));
    }

    // public function addProductq(Request $request)
    // {
    //     a
    // }


}
