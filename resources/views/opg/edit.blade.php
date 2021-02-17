@extends('layouts.ap2')
@auth
@if(Auth::user()->isSuperAdmin()|| $opg->user_id == Auth::user()->my_id())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{  $opg->naziv}} </div>

                    <div class="card-body">

                        <form action="{{ route('opg.update', $opg->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <table class="table table-bordered">
                                <tr>  <td> Naziv </td> <td><input type="text" name="naziv" value="{{ $opg->naziv }}"/> </td></tr>
                                <tr> <td>   Telefon    </td> <td>      <input type="text" name="telefon" value="{{ $opg->telefon }}"/> </td></tr>
                                <tr>    <td>  Adresa   </td> <td>   <input type="text" name="adresa" value="{{ $opg->adresa }}" /> </td></tr>
                                <tr>    <td>  Lokalitet  </td> <td>  <textarea rows="5" name="Lokalitet" >{{ $opg->Lokalitet }} </textarea> </td></tr>
                               @if(Auth::user()->isSuperAdmin())  <tr>  <td>  Korisnik   </td> <td>  <select class="form-control" name="user_id">
                                    @foreach($korisnici as $item)
                                    @if($opg->user_id==$item->id)
                                      <option selected="selected" value="{{$item->id}}">{{$item->name}}</option>


                                      @else
                                      <option  value="{{$item->id}}">{{$item->name}}</option>

                                      @endif
                                    @endforeach
                                  </select>
                                </td></tr>
                                @endif
                            </table>
                            <input type="submit" class="btn btn-primary"  value="Submit"/>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
@endauth
