@extends('layouts.ap2')

@section('content')
@auth
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Novi proizvod </div>

                    <div class="card-body">

                        <form action="{{route('product.store')}}" id="form1"method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <table class="table table-bordered">
                                <tr>  <td> Naziv </td> <td><input type="text" name="naziv" /> </td></tr>
                                <tr>    <td>  opis   </td> <td>   <input type="text" name="opis" /> </td></tr>

                                <tr> <td>   Cijena    </td> <td>      <input type="number" step="0.05" name="cijena"/> </td></tr>
                                <tr>    <td>  Slika    </td> <td>
                                    <input type="file" name="file" required>
                                </td></tr>
                                <tr>  <td>  Opg   </td> <td>  <select class="form-control" name="opg_id">
                                    @if(Auth::user()->isSuperAdmin()){
                                    @foreach($opg as $items)
                                    <option value="{{ $items->id }}">{{ $items->naziv }}</option>
                                    @endforeach
                                    }

                                    @else{
                                    @foreach ($opg as $items )
                                    @if($items->user_id == Auth::user()->my_id())
                                    <option value="{{ $items->id }}">{{ $items->naziv }}</option>
                                    @endif
                                    @endforeach}
                                    @endif



                                  </select>
                                </td></tr>

                                <tr><td>
                                       Popust</td><td>
                                        <input type="number"  name="popust"  min="0" max="99"value="0"/> %
                                  </td></tr>
                                <tr>  <td>  Kategorija   </td> <td>  <select class="form-control" name="kategorija_id">
                                    @foreach($kategorija as $item)
                                      <option value="{{$item->id}}">{{$item->naziv}}</option>
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
    @endauth
@endsection

