@extends('layouts.ap2')
@auth
@if(Auth::user()->isSuperAdmin())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Novi opg</div>

                    <div class="card-body">

                        <form action="{{route('opg.store')}}" id="form1"method="post">
                            {{ csrf_field() }}
                            <table class="table table-bordered">
                                <tr>  <td> Naziv </td> <td><input type="text" name="naziv" /> </td></tr>
                                <tr> <td>   Telefon    </td> <td>      <input type="text" name="telefon"/> </td></tr>
                                <tr>    <td>  Adresa   </td> <td>   <input type="text" name="adresa" /> </td></tr>
                                <tr>  <td>  Korisnik   </td> <td>  <select class="form-control" name="user_id">
                                    @foreach($users as $item)
                                      <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                  </select>
                                </td></tr>
                            </table>
                            <input type="submit" form="form1" value="Submit"/>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
@endauth
