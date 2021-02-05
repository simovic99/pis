@extends('layouts.ap2')
@auth
@if(Auth::user()->isSuperAdmin())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{  $kategorije->naziv}} </div>

                    <div class="card-body">

                        <form action="{{ route('kategorije.update', $kategorije->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <table class="table table-bordered">
                                <tr>  <td> Naziv </td> <td><input type="text" name="naziv" value="{{ $kategorije->naziv }}"/> </td></tr>

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
