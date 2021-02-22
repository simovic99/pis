@extends('layouts.ap2')


@section('content')
    <div class="container"  >
        <div class="row justify-content-center" id="naruci">
            <div class="col-md-12" >
                <div class="card"  >
                    <div class="card-header">@auth <button class="btn btn-primary"><x-nav-link :href="route('product.create')" class="n1">
                        {{ __('Dodaj novi proizvod') }}
                    </x-nav-link></button> @endauth
                    <button class="btn btn-primary akcija ">   <x-nav-link :href="route('akcija')" :active="request()->routeIs('akcija')" class="n2">
                        {{ __('Proizvodi na akciji') }}
                 </x-nav-link> </button>

                 </div>

                    <div class="card-body" >
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}

                            </div>
                        @endif

                        <div class="">
                            <div>
                                <div class="mx-auto pull-right">
                                    <div class="search">
                                        <form action="{{ route('product.index') }}" method="GET" role="search">

                                            <div class="input-group">

                                                <input type="text" class="form-control mr-2" name="term" placeholder="Pretraži proizvode" id="term">
                                                <span class="input-group-btn mr-5 mt-1">
                                                    <button class="btn btn-primary" type="submit" title="Pretraži proizvode">
                                                        <span class="fas fa-search"></span>
                                                    </button>

                                                <a href="{{ route('product.index') }}" class=" mt-1">

                                                        <button class="btn btn-danger" type="button" title="Refresh page">
                                                            <span class="fas fa-sync-alt"></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>




                            @if($x==0)
                        <div class="n2">
                            <br>
                            Nijedan proizvod " {{$_GET['term']  }} "  nije pronađen
                        </div>
                            @endif

                            @foreach ($products as $product)




                            <div class="large-3 columns ">

                        <table class="tablice">

                                  <th><h2>{{$product->naziv}}</h2></th>
                            <tbody>
                            <tr><td>
                                <img class="slike"  src="{{ url('../storage/app/public/product/'.$product->img) }}"/></td></tr>


                                 <tr>     <td><strong>Opis: </strong>{{ $product->opis}}</td></tr>
                                 @if($product->popust ==0)
                                 <tr>  <td><strong>Cijena:</strong> {{ $product->cijena }} KM</td></tr>
                                 @else
                                 <tr>  <td><strong>Stara cijena:</strong> {{ $product->cijena }} KM</td></tr>
                                 <tr>  <td><strong>Cijena s popustom :</strong> {{ $product->cijena * (1- $product->popust/100) }} KM</td></tr>
                                 @endif
                                 @foreach($cat as $kategorija)

                                @if($kategorija->id == $product->kategorija_id)
                                 <tr>  <td><strong>Kategorija:</strong> {{ $kategorija->naziv}} </td></tr>
                                 @endif
                                @endforeach
                                 <tr>     <td><strong>Opg: </strong> @foreach($opgs as $opg)
                                    @if($opg->id == $product->opg_id)
                                     {{  $opg->naziv}}
                                     </td></tr>

                                    @auth @if(Auth::user()->isSuperAdmin() || Auth::user()->my_id() == $opg->user_id) <tr>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        <td><a href="{{ route('product.edit', $product->id) }}"> <i class="fas fa-edit  fa-lg"></i></a>
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                            <i class="fas fa-trash fa-lg text-danger"></i>
                                   </td></form>
                                </tr>
                                @endif
                                @endif

                                @endauth

                                    @endforeach

                                     </td></tr>



                         <tr> <td><a href="{{ route('opg.show', $product->opg_id) }}"><button class="btn btn-primary">Detalji opg-a</button> </a></td>
                         </tr>




                            </tbody>

</table>

                                </form>
                            </div>
                            <!--  -->

                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
