@extends('layouts.ap2')


@section('content')
    <div class="container"  >
        <div class="row justify-content-center" id="naruci">
            <div class="col-md-12" >
                <div class="card"  >
                    <div class="card-header">@auth <button class="btn btn-primary"><x-nav-link :href="route('product.create')" class="n1">
                        {{ __('Dodaj novi proizvod') }}
                    </x-nav-link></button> @endauth  </div>

                    <div class="card-body" >
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}

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
                                 <tr>  <td><strong>Cijena:</strong> {{ $product->cijena }} KM</td></tr>


                                     <tr>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        <td><a href="{{ route('product.edit', $product->id) }}"> <i class="fas fa-edit  fa-lg"></i></a>
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                            <i class="fas fa-trash fa-lg text-danger"></i>
                                   </td></form>
                                </tr>




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
