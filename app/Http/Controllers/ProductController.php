<?php

namespace App\Http\Controllers;

use App\Models\Kategorije;
use App\Models\Opg;
use App\Models\Product;
use App\Models\User;
use App\Product as AppProduct;
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
        //
        $opgs=Opg::all();
        $products=Product::all();
        return view('product.index',compact('opgs','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users=User::all();
        $opg=Opg::all();
        $kategorija=Kategorije::all();
        return view('product.create',compact('users','opg','kategorija'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'naziv' => 'required',
            'opis' => 'required',
            'kategorija_id' => 'required',
            'cijena'=>'required',
            'file'=>'required',
            'opg_id' => 'required'
        ]); if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('product', 'public');
            $product = new Product([
                "naziv" => $request->get('naziv'),
                "img" => $request->file->hashName(),
                'opis' => $request->get('opis'),
            'kategorija_id' => $request->get('kategorija_id'),
            'cijena'=>$request->get('cijena'),

            'opg_id' => $request->get('opg_id')

            ]);
            $product->save(); // Finally, save the record.
            // Store the record, using the new file hashname which will be it's new filename identity.

        }

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
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
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
