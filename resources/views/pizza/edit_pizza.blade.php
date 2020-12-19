@extends('layouts.app')
@section('title', 'Edit Pizza')

@section('css')
    
@section('content')

    <div class="container bg-gray mt-5 mb-5">
        <div class="container pt-4 pl-2 pr-2 pb-4">
            <div class="row">

                <div class="col">
                    <div class="card mb-1 font-style">
                        <img src="{{ $pizzas->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pizzas->name }}</h5>
                            <p class="card-text">{{ $pizzas->description }}</p>
                            <p class="card-text">Rp. {{ $pizzas->price }}</p>
                        </div>
                    </div>
                </div>

                <div class="col pizza-detail">
                    <div class="col-md-12 mb-5">
                        <h2>Edit Pizza Details</h2>
                    </div>
                    <form method="POST" action="/pizza/edit/accept/{{ $pizzas->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pizza Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" required autocomplete="name" autofocus>
                            
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Pizza Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price" required autocomplete="price" autofocus>
                            
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Pizza Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" name="description" required autocomplete="description" autofocus>
                            
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Pizza Image') }}</label>

                            <div class="col-md-6">
                                <input type="file" id="image" name="image" class="mt-1 @error('image') is-invalid @enderror" value="{{ old('image') }}" required autocomplete="image" autofocus>
                            
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Edit Pizza') }}
                                </button>
                            </div>
                        </div>   

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection