<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::get();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::get();
        return view('backend.products.create',compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {
        try {
            $validated = $request->validated();

            product::create([
                // 'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'name'=> $request->name,
                'price'=>$request->price,
                'sections_id'=>$request->sections_id,
                'notes'=>$request->notes,
            ]);
            session()->flash('Add', 'تم اضافة المنتج بنجاح');
            return redirect('products');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::findorFail($id);
        $sections = Section::get();
        return view('backend.products.edit',compact('product','sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductsRequest $request, $id)
    {
        $validated = $request->validated();
        $product = product::findorFail($id);

        try {

            $product->update([
                // 'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'name'=> $request->name,
                'price'=>$request->price,
                'sections_id'=>$request->section,
                'notes'=>$request->notes,
            ]);
            session()->flash('Edit', 'تم تعديل المنتج بنجاح');
            return redirect('products');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            product::destroy($request->pro_id);
            session()->flash('Deleted', 'تم حذف المنتج بنجاح');
            return redirect('products');

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
