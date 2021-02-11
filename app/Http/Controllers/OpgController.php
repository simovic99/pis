<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Opg;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OpgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opgs=Opg::all();
           return view('opg.index',compact('opgs'));
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
        return view('opg.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required',
            'telefon' => 'required',
            'adresa' => 'required',
            'user_id' => 'required'
        ]);

        Opg::create($request->all());

        return redirect()->route('opg.index')
            ->with('success', 'Opg created successfully.');

        //
        }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opg  $opg
     * @return \Illuminate\Http\Response
     */
    public function show(Opg $opg)

    {
        $email = DB::table('users')->where('id', $opg->user_id)->value('email');
        $products=DB::table('products')->where('opg_id',$opg->id)->get();
       return view('opg.show', compact('opg','email','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opg  $opg
     * @return \Illuminate\Http\Response
     */
    public function edit(Opg $opg)
    {

        $korisnici=User::all();
        return view('opg.edit', compact('opg','korisnici'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opg  $opg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opg $opg)
    {
        //
        $request->validate([
            'naziv' => 'required',
            'adresa' => 'required',
            'telefon' => 'required',
            'Lokalitet'=>'required',

        ]);
        $opg->update($request->all());

        return redirect()->route('opg.index')
            ->with('success', 'Opg updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opg  $opg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opg $opg)
    {
        $opg->delete();

        return redirect()->route('opg.index')
            ->with('success', 'Opg deleted successfully');

    }
}
