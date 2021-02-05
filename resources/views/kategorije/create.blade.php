@extends('layouts.ap2')
@auth
@if(Auth::user()->isSuperAdmin())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nova kategorija</div>

                    <div class="card-body">

                        <form action="{{route('kategorije.store')}}" id="form1"method="post">
                            {{ csrf_field() }}
                            <table class="table table-bordered">
                                <tr>  <td> Naziv </td> <td><input type="text" name="naziv" /> </td></tr>
                            </table>
                            <input type="submit" form="form1" value="Spremi" class="btn btn-primary"/>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
@endauth
