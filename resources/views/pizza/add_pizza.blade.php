@extends('layouts.app')
@section('title', 'Add Pizza')
    
@section('css')

@section('content')

    <div class="container position-form-add">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-5 pb-5">
                <div class="card">
                    <div class="card-header regis-header">Add New Pizza</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/pizza/add/accept') }}" enctype="multipart/form-data">
                            @csrf

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
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Add Pizza') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection