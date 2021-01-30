<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Korisnik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KorisniciController extends Controller
{
   public function index(){
//$korisnici= DB::select('select  id, name,email,role from users');

$korisnici=User::all();
return view('users.index',compact('korisnici'));

}
public function create()
{
    //
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
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show(User $user)
{
    //
 //   $users = DB::select('select * from users where id = ?',[$id]);
   // return view('users.edit',['users'=>$users]);
   return view('users.show', compact('user'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */

    public function edit(User $user) {
        return view('users.edit', compact('user'));
}




/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, User $user){
    $request->validate([
        'name' => 'required',
        'email' => 'required',

    ]);


    $user->update($request->all());

    return redirect()->route('users.index')
        ->with('success', 'User updated successfully');

}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy(User $user)
{

    $user->delete();

    return redirect()->route('users.index')
        ->with('success', 'User deleted successfully');

}}

