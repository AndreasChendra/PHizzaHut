@extends('layouts.app')
@section('title', 'Delete Pizza')

@section('css')

@section('content')
    
    <div class="pt-5 pb-5">
        <div class="container bg-gray mt-5 mb-5">
            <div class="container pt-4 pl-2 pr-2 pb-4">
                <div class="row">
                    <div class="col">
                        <div class="card-group">
        
                            <div class="card">
                                <img src="{{ $pizza->image }}" class="card-img-top" alt="...">
                            </div>
        
                        </div>
                    </div>
                    <div class="col pizza-detail">
                        <h3 class="card-title">{{ $pizza->name }}</h3>
                            
                        <p>{{ $pizza->description }}</p>
                    
                        <p>Rp. {{ $pizza->price }}</p>
                        
                        <div class="form-inline justify-content-left">
                            <form method="POST" action="/pizza/delete/accept/{{ $pizza->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                            </form>
                            <a class="btn btn-primary btn-lg" href="/">Don't Delete</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection