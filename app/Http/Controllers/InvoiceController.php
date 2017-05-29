<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Invoice;
use App\Items;

class InvoiceController extends Controller
{
    public function index()
    {   
        // $users = DB::table('users')->paginate(3);
        $invoice = Invoice::paginate(5);

        return view('index',['invoices'=>$invoice]);
    }

    public function create(Request $request){

        $arr = request()->get('item_name');
        $item_no = count($arr);

        $inv = Invoice::create([
            
            'invoice_name'=> $request->get('invoice_name'),
            'no_inv_items'=> $item_no,
            'tax' =>  $request->get('tax')
           
        ]);

        // we want to create items array 

        // for loop through items 
        $items = [];
         for($i=0;$i<$item_no;$i++){
            $items[$i]=  [
               
                'item_name' => $request->get('item_name')[$i],
                'no_items' =>  $request->get('no_items')[$i],
                'price' =>  $request->get('price')[$i],
                'invoice_id' => $inv->id
                
            ];

        }

        // Insert items array to mysql using insert method 
        $item = Items::insert($items);

    	return  redirect('/');
    }

    public function add(){
        return view('add');
    }

    public function edit($id){

       $invoice = Invoice::where('id',$id)->first();
       $invoice->load('items');
       // dd($invoice->items);

       // $item = Items::where('invoice_id',$id)->get();
       // dd($invoice,$item);
       // dd($item);
       // return view('edit',['invoices'=>$invoice]);
       return view('edit',compact('invoice'));
    }

    public function delete($id){
       Invoice::where('id',$id)->delete();
       Items::where('invoice_id',$id)->delete();
       return redirect('/');
    }

    public function update(Request $request){

        $id = request()->get('inv_id');
       
        $invoice = Invoice::find($id);

        $arr=request()->get('item_name');
        $item_no = count($arr);

        $invoice->invoice_name = $request->invoice_name;
        $invoice->no_inv_items = $item_no; 
        $invoice->tax = $request->tax; 

        $invoice->save(); 

        $item = Items::where('invoice_id',$id)->delete();
        
        $items = [];
        for($i=0;$i<$item_no;$i++){
            $items[$i]=  [
               
                'item_name' => $request->get('item_name')[$i],
                'no_items' =>  $request->get('no_items')[$i],
                'price' =>  $request->get('price')[$i],
                'invoice_id' => $id
                
            ];
        }

        $item = Items::insert($items);
        return redirect('/');
    }

      public function pdfview($id){

        // $id = request()->get('inv_id');
        // dd($id);
        $invoice = Invoice::where('id',$id)->first();

        // dd($invoice->subtotal); 

        $invoice->load('items');
        // dd($invoice->tax);
        // dd($invoice->total);

        view()->share('invoice',$invoice);

            $pdf =\PDF::loadView('pdfview');
            // return $pdf->stream();
            return $pdf->download('pdfview.pdf');


        return redirect('/');
    }

    public function search(Request $request){
        $sname = request()->get('search');

        $invoices = Invoice::where('invoice_name','LIKE','%'.$sname.'%')->get();
        return view('search',compact('invoices'));
    }
}
