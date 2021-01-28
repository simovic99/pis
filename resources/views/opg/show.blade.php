@extends('layouts.ap2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1>Opg</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                                        <div class="large-3 columns ">
                                    <table class="table table-bordered" id="tablice" >
                                        <thead>
                                        <tr>
                                            <th>{{$opg->naziv}} </th></tr>

                                        <tbody>

                                <tr>

                                    <td><strong>Telefon: </strong> {{$opg->telefon}}</td></tr>

                                    </tr>
                                    <tr>

                                        <td><strong>Adresa: </strong> {{$opg->adresa}}</td></tr>

                                        </tr>
                                        <tr>

                                            <td><strong>E-mail: </strong> {{$email}}</td></tr>

                                            </tr>


                                    </td>
                                </tr>
                                        </tbody>
                                    </table></div>
                                    <hr>
                                    @foreach ($products as $product)

                                    <div class="large-3 columns ">

                                <table class="tablice">

                                          <th><h2>{{$product->naziv}}</h2></th>
                                    <tbody>
                                    <tr><td>
                                        <img class="slike"  src="{{ url('../storage/app/public/product/'.$product->img) }}"/></td></tr>


                                         <tr>     <td><strong>Opis: </strong>{{ $product->opis}}</td></tr>

                                 <tr>  <td><strong>Cijena:</strong> {{ $product->cijena }} KM</td></tr>





                                    </tbody>

        </table>
    </form>
</div>

        @endforeach


                                    <!--  -->



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
