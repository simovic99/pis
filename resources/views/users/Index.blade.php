@extends('layouts.ap2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1>Korisnici</h1></div>

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
