<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Quotation;
use App\Models\Client;
use App\Models\Product;

class PdfController extends Controller
{
    public function generatePdf($id)
    {
       
       // Retrieve specific quotation based on the ID
       $quotation = Quotation::findOrFail($id);

       // Retrieve specific client based on the client_id of the quotation
       $client = Client::findOrFail($quotation->client_id);

       // Retrieve specific product based on the product_id of the quotation
       $product = Product::findOrFail($quotation->product_id);

       // Generate HTML content for the PDF
       $html = view('quotations.pdf.template', compact('quotation', 'client', 'product'))->render();

       // Setup Dompdf options
       $options = new Options();
       $options->set('isHtml5ParserEnabled', true);
       $options->set('isRemoteEnabled', true);

       // Instantiate Dompdf with options
       $dompdf = new Dompdf($options);

       // Load HTML content
       $dompdf->loadHtml($html);

       // Render PDF (optional: set the paper size and orientation)
       $dompdf->setPaper('A4', 'portrait');
       $dompdf->render();

       // Output the generated PDF
       return $dompdf->stream('quotation_' . $id . '.pdf');
       
       
       
       
       
       
        // // Retrieve specific quotation based on the ID
        // $quotations = Quotation::findOrFail($id);

        // // Retrieve specific client based on the client_id of the quotation
        // $clients = Client::findOrFail($quotations->client_id);

        // // Retrieve specific product based on the product_id of the quotation
        // $products = Product::findOrFail($quotations->product_id);

        // // Generate PDF using dompdf
        // $pdf = PDF::loadView('quotations.pdf.template', [
        //     'quotations' => $quotations,
        //     'clients' => $clients,
        //     'products' => $products,
        // ]);

        // // Return the PDF as a download
        // return $pdf->download('quotation_' . $id . '.pdf');
    }
}
