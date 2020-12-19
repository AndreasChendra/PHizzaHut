@extends('layouts.app')
@section('title', 'PHizza Hut')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')

    <div class="container">
        
        <h1>Our freshly made pizza!</h1>
        <br>
        <div class="container">
            
            <h4>order it now!</h4>
            @if (Auth::user() != null && Auth::user()->role_id == 1)
                <a class="btn btn-success btn-lg" href="/pizza/add">Add Pizza</a>
            @else
                <form class="form-inline justify-content-end">
                    <input class="form-control" type="search" style="width:500px;" placeholder="Search Pizza" name="search" value="{{ Request::input('search') }}" aria-label="Search">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                </form>
            @endif

            <div class="row row-cols-1 row-cols-md-3 justify-content-center pt-4">

                @foreach ($pizzas as $pizza)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img src="{{ $pizza->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title font-style">{{ $pizza->name }}</h5>
                                <p class="card-text font-style">Rp. {{ $pizza->price }}</p>

                                <a class="btn btn-primary btn-lg btn-block" href="/pizza/detail/{{ $pizza->id }}">Detail</a>

                                @if (Auth::user() != null && Auth::user()->role_id == 1)
                                    
                                    <div class="btn-group btn-block" role="group">
                                        <a href="/pizza/edit/{{ $pizza->id }}" class="btn btn-warning btn-lg font-style">Update</a>
                                        <a href="/pizza/delete/{{ $pizza->id }}" class="btn btn-danger btn-lg font-style">Delete</a>
                                    </div>
                                    
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            
            </div>

            <div class="row justify-content-center">
                <div class="div col-md-2">
                    {{ $pizzas->links() }}
                </div>
            </div>
            
        </div>

    </div>

@endsection
