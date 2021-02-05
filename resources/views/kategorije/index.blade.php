@extends('layouts.ap2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                 <div class="card-header">   @auth @if(Auth::user()->isSuperAdmin())<button class="btn btn-primary"><x-nav-link :href="route('kategorije.create')" class="n1">
                        {{ __('Dodaj novu kategoriju') }}
                    </x-nav-link></button> </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @foreach ($kategorije as $kategorija)
                                        <div class="large-3 columns ">
                                    <table class="table table-bordered" id="tablice" >
                                        <thead>
                                        <tr>
                                            <th>{{$kategorija->naziv}} </th></tr>
                                </tr>
                             <tr>
                                    <form action="{{ route('kategorije.destroy', $kategorija->id) }}" method="POST">
                                         <td><a href="{{ route('kategorije.edit', $kategorija->id) }}"><i class="fas fa-edit  fa-lg"></i> </a>
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger"></i>



                               </td>
                                    </form>
                            </tr>

                                        </tbody>
                                    </table></div>
                                      @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif @endauth
@endsection

