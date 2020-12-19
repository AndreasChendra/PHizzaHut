@extends('layouts.app')
@section('title', "Cart")

@section('css')

@section('content')

    @if (empty($carts) || count($carts) == 0)
        <div class="container position-cart-empty">
            <div class="alert alert-danger pt-5 pb-5" role="alert">
                <strong>Cart is Empty!</strong>
            </div>
        </div>
    @else
        <div class="container pt-5 pb-5">
            <table class="table table-hover">
                <thead class="regis-header text-center">
                    <tr>
                        <th scope="col">Pizza Image</th>
                        <th scope="col">Pizza Name</th>
                        <th scope="col">Pizza Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($carts->reverse() as $cart)
                        <tr>
                            <td>
                                <img src="{{ $cart->pizza->image }}" class="card-img-top" style="width: 200px" alt="...">
                            </td>
                            <td class="label-cart align-middle">{{ $cart->pizza->name }}</td>
                            <td class="label-cart align-middle">Rp. {{ $cart->pizza->price}}</td>
                            <td class="align-middle">
                                <form method="POST" action="/cart/update/{{ $cart->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="input-group col-10 ml-4">
                                        <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" placeholder="{{ $cart->quantity }}" value="{{ $cart->quantity }}" required autocomplete="quantity" autofocus>
                                        <div class="input-group-append">
                                            <button class="btn btn-warning">Update</button>
                                        </div>
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </form>
                            </td>
                            <td class="align-middle">
                                <form method="POST" action="/cart/delete/{{ $cart->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

            @php $user_id = Auth::user()->id @endphp
            <form method="POST" action="/checkOut/{{ $user_id }}" class="mt-3 mb-5">
                {{ csrf_field() }}
                <button class="btn btn-success float-right">Check Out</button>
            </form>
        </div>
    @endif

@endsection