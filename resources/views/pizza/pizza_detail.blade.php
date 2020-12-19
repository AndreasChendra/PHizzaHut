@extends('layouts.app')
@section('title', "Pizza's Detail")

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
                    <div class="col pizza-detail font-style">

                        <h3 class="card-title">{{ $pizza->name }}</h3>
                            
                        <p>{{ $pizza->description }}</p>
                    
                        <p>Rp. {{ $pizza->price }}</p>
                        
                        @if (Auth::user() != null && Auth::user()->role_id == 2)
                        @php $user_id = Auth::user()->id @endphp
                            <form method="POST" action="/addToCart/{{ $pizza->id }}/{{ $user_id }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-md-4 pr-0">
                                        <label for="quantity" class="col-form-label">{{ __('Quantity :') }}</label>
                                    </div>

                                    <div class="col-md-8 pl-0">
                                        <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" required autocomplete="new-quantity">
            
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mt-4 justify-content-center d-flex">
                                        <button class="btn btn-success btn-lg">
                                            {{ __('Add to Cart') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection