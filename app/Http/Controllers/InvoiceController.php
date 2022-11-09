<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\Books;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function invoice()
    {
       return view('dashboard.add_invoice');
    }

    public function add_new_invoice(Request $request)
    {

        if ($request->name_of_client == null || $request->contact_number == null || $request->email == null || $request->hasFile('file_name') == null ){
            return Response()->json([
                "success" => 'false',
            ]);
        }else{
            if ($request->hasFile('file_name')) {

                $files = $request->file('file_name'); // will get all files

                $file_name = $files->getClientOriginalName(); //Get file original name

                $files->storeAs('/public/',time()."_".$file_name);

                $invoice  = new Invoice();
                $invoice->name_of_client = $request->name_of_client;
                $invoice->contact_number = $request->contact_number;
                $invoice->email = $request->email;
                $invoice->file_name = time()."_".$file_name;
                $invoice->status = "pending";

                $results =  $invoice->save();

                if($results){
                    return Response()->json([
                        "success" => 'true',
                    ]);
                }


            }
        }

    }

    public function all_invoice(Request $request)
    {
         $invoices['invoices'] = Invoice::orderBy('id','DESC')->get();
        $message = "";
        return view('dashboard.all_invoices',compact('message'))->with($invoices);
    }

    public function previously_sent_invoice(Request $request)
    {
        $invoices['invoices'] = Invoice::where('status','sent')->orderBy('id','DESC')->limit(50)->get();
        return view('dashboard.previously_sent_invoices')->with($invoices);
    }

    public function sent_invoice(Request $request)
    {
        $invoices['invoices'] = Invoice::where('status','sent')->orderBy('updated_at','DESC')->get();
        return view('dashboard.sent_invoices')->with($invoices);
    }

    public function dashboard(Request $request)
    {
        $invoice_count = Invoice::count();
        $invoice_sent = Invoice::where('status','sent')->count();
        $invoice_previously_sent = Invoice::where('status','sent')->orderBy('id','DESC')->limit(50)->count();
        return view('dashboard.dashboard',compact('invoice_sent','invoice_count','invoice_previously_sent'));

    }

    public function send_email(Request $request)
    {
        $data["email"] = $request->client_email;
        $data["title"] = "Invoice";

        $file = storage_path(). "/app/public/".$request->file_name;

        $results =  Mail::send('dashboard.invoice_mail', $data, function($message)use($data, $file) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"]);
            $message->attach($file);

        });
        if($results){
            $update_invoice =  Invoice::where('id',$request->file_id)->first();
            $update_invoice->status = 'sent';
            $update_Result = $update_invoice->save();

            if ($update_Result != null){
                return Response()->json([
                    "success" => 'true',
                ]);
            }
        }

    }
}





