<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeinvoicedata;
use App\Models\Invoice;
use App\Models\Invoices_details;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::latest()->paginate(5);
        return view('backend.invoices.index',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sections = Section::all();
        return view('backend.invoices.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeinvoicedata $request)
    {
        try {
            $validated = $request->validated();
            invoice::create([
                'invoice_number'=>$request->invoice_number,
                'invoice_date'=>$request->invoice_date,
                'sections_id'=>$request->section,
                'product_id'=>$request->product_id,
                'q'=>$request->q,
                'price'=>$request->price,
                'discount'=>$request->discount,
                'net'=>$request->net,
                'tax_rate'=>$request->tax_rate,
                'tax_value'=>$request->tax_value,
                'total'=>$request->total,
                'status'=> 1,
                'status-val' => $request->val,
                'notes'=>$request->notes,
            ]);
            $invoice_id = Invoice::latest()->first()->id;
            Invoices_details::create([
                'id_Invoice' => $invoice_id,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product_id,
                'Section' => $request->section,
                'q'=>$request->q,
                'price'=>$request->price,
                'discount'=>$request->discount,
                'net'=>$request->net,
                'tax_rate'=>$request->tax_rate,
                'tax_value'=>$request->tax_value,
                'total'=>$request->total,
                'status' => 1,
                'status-val' => $request->val,
                'note' => $request->notes,
                'user' => (Auth::user()->name),
            ]);
            session()->flash('Add', 'تم اضافة المنتج بنجاح');
            return redirect('invoices');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('backend.invoices.show',compact('invoice'));
        // return $invoice->id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        // $invoice = invoice::findorFail($id);
        $sections = Section::all();
        return view('backend.invoices.edit', compact('sections', 'invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        try {

            // $invoice = invoice::findorFail($id);

            $invoice->update([
                'invoice_number' => $request->invoice_number,
                'invoice_date' => $request->invoice_date,
                'sections_id'=>$request->section_id,
                'product_id' => $request->product_id,
                'q'=>$request->q,
                'price' => $request->price,
                'discount' => $request->discount,
                'net' => $request->total_after_discount,
                'tax_rate' => $request->tax_rate,
                'tax_value' => $request->tax_value,
                'total' => $request->total,
                'status' => $request->status,
                'notes' => $request->notes,
            ]);
            session()->flash('Edit', 'تم تعديل الفاتورة بنجاح');
            return redirect('invoices');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            invoice::destroy($request->invoice_id);
            session()->flash('Delete', 'تم حذف الفاتورة بنجاح');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getProduct($section_id)
    {
        $products = Product::where('sections_id', $section_id)->pluck('name','id');
        return $products;
    }

    public function getPrice($product_id)
    {
        $price = Product::where('id', $product_id)->pluck('price');
        return $price;
    }


}
