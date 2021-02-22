@extends('layouts.ap2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @auth  @if(Auth::user()->isSuperAdmin())
                        <button class="btn btn-primary"><x-nav-link :href="route('users.create')" class="n1">Dodaj novog korisnika </x-nav-link></button>
                        @endif
                        @endauth
                        </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @auth @foreach ($korisnici as $korisnik)
                                @if($korisnik->id == Auth::user()->my_id() && !Auth::user()->isSuperAdmin())
                                <div class="large-3 columns ">
                                    <table class="table table-bordered" id="tablice" >
                                        <thead>
                                        <tr>
                                            <th>{{$korisnik->name}} </th></tr>

                                        <tbody>

                                <tr>

                                    <td><strong>E-mail: </strong> {{$korisnik->email}}</td></tr>
                            <!--    <p><h3> role :{{$korisnik->role}}</h3></p>-->
                                <tr><td> <strong> Uloga: </strong>
                                @if($korisnik->role==2) superadmin

                                    @else (korisnik->role==0) korisnik
                                        @endif</td>
                                    </tr>
                                    <form action="{{ route('users.destroy', $korisnik->id) }}" method="POST">
                                 <tr> <td><a href="{{ route('users.edit', $korisnik->id) }}"><i class="fas fa-edit  fa-lg"></i></a>
                                       @csrf
                                    @method('DELETE')

                                    <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                        <i class="fas fa-trash fa-lg text-danger"></i>
            </td>
                                 </tr></form>

                                        </tbody>
                                    </table></div>
                                    <hr>
                                    @foreach ($opgs as $opg)
                                    @if($opg->user_id == Auth::User()->my_id())
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


                                    </tr>

                                 <tr><td><a href="{{ route('opg.show', $opg->id) }}"><button class="btn btn-primary">Detalji opg-a</button> </a></td>
                                </tr>
                                @auth @if(Auth::user()->isSuperAdmin() || Auth::user()->my_id() == $opg->user_id) <tr>
                                    <form action="{{ route('opg.destroy', $opg->id) }}" method="POST">
                                         <td><a href="{{ route('opg.edit', $opg->id) }}"><i class="fas fa-edit  fa-lg"></i> </a>
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger"></i>



                               </td>
                                    </form>
                            </tr>
                            @endif
                            @endauth
                                        </tbody>
                                    </table></div>
                                    @endif
                                      @endforeach


                                    @endif

                            @endforeach

                            @if(Auth::user()->isSuperAdmin())
                                    @foreach ($korisnici as $korisnik)
                                        <div class="large-3 columns ">
                                    <table class="table table-bordered" id="tablice" >
                                        <thead>
                                        <tr>
                                            <th>{{$korisnik->name}} </th></tr>

                                        <tbody>

                                <tr>

                                    <td><strong>E-mail: </strong> {{$korisnik->email}}</td></tr>
                            <!--    <p><h3> role :{{$korisnik->role}}</h3></p>-->
                                <tr><td> <strong> Uloga: </strong>
                                @if($korisnik->role==2) superadmin

                                    @else (korisnik->role==0) korisnik
                                        @endif</td>
                                    </tr>
                                    <form action="{{ route('users.destroy', $korisnik->id) }}" method="POST">
                                 <tr> <td><a href="{{ route('users.edit', $korisnik->id) }}"><i class="fas fa-edit  fa-lg"></i></a>
                                       @csrf
                                    @method('DELETE')

                                    <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                        <i class="fas fa-trash fa-lg text-danger"></i>
            </td>
                                 </tr></form>

                                        </tbody>
                                    </table></div>
                            @endforeach


                            @endif



@endauth




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
