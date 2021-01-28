@extends('layouts.ap2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                 <div class="card-header">   @auth<button class="btn btn-primary"><x-nav-link :href="route('opg.create')" class="n1">
                        {{ __('Dodaj novi opg') }}
                    </x-nav-link></button> @endauth </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                                    @foreach ($opgs as $opg)
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
                                 <tr> <td><a href="edit/{{ $opg->id }}"><button class="btn btn-primary">Ažuriraj</button> </a></td>
                                 </tr>
                                 <tr><td>      <a href="delete/{{ $opg->id }}"><button class="btn btn-primary">Izbriši</button> </a>

                                    </td>
                                </tr>
                                        </tbody>
                                    </table></div>
                                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
