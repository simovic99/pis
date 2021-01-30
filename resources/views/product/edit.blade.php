@extends('layouts.ap2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Uredi proizvod</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @auth
                            @if(Auth::user()->isSuperAdmin()|| Auth::user()->my_id() == $opg)

                            <form action="{{ route('product.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Naziv:</strong>
                                            <input type="text" name="naziv" value="{{ $product->naziv }}" class="form-control" placeholder="Naziv">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>opis:</strong>
                                            <textarea class="form-control" style="height:50px" name="opis"
                                                placeholder="opis">{{ $product->opis }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>cijena:</strong>
                                            <input type="number" step="0.05" name="cijena" value="{{ $product->cijena}}"/> KM
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>slika:</strong>
                                            <img class="slike"  src="{{ url('../storage/app/public/product/'.$product->img) }}"/>
                                            <input type="file" name="file" />
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>kategorija:</strong>
                                            <select name="kategorija_id" class="form-control" >

                                                @foreach($kategorija as $item)
                                                <option value="{{$item->id}}">{{$item->naziv}}</option>
                                              @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>




                            @endif

                            @else Niste admin ni vlasnik ovog proizvoda

                        @endauth




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


