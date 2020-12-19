@extends('layouts.app')
@section('title', 'Transaction Detail')
    
@section('css')
    
@section('content')

    <div class="container pt-5 pb-5">
        <table class="table table-hover">
            <thead class="regis-header text-center">
                <tr>
                    <th scope="col">Pizza Image</th>
                    <th scope="col">Pizza Name</th>
                    <th scope="col">Pizza Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($transaction as $tr)
                    <tr>
                        <td>
                            <img src="{{ $tr->pizza->image }}" class="card-img-top" style="width: 200px" alt="...">
                        </td>
                        <td class="label-cart align-middle text-center">{{ $tr->pizza->name }}</td>
                        <td class="label-cart align-middle text-center">Rp. {{ $tr->pizza->price }}</td>
                        <td class="label-cart align-middle text-center">{{ $tr->quantity }}</td>
                        @php
                            $totalPrice = ($tr->quantity*$tr->pizza->price);
                        @endphp
                        <td class="label-cart align-middle text-center">Rp. {{ $totalPrice }}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

@endsection