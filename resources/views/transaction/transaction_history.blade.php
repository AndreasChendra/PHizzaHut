@extends('layouts.app')
@section('title', 'Transaction History')
    
@section('css')
    
@section('content')

    @if (empty($transactions) || count($transactions) == 0)
        <div class="container position-cart-empty">
            <div class="alert alert-danger pt-5 pb-5" role="alert">
                <strong>
                    @if(Auth::user()->role_id == 1)
                        User Does Not Make Transactions
                    @else
                        You Dont Have a Transaction!
                    @endif
                </strong>
            </div>
        </div>
    @else
        <div class="container pt-5 pb-5">
            <table class="table table-hover">
                <thead class="regis-header text-center">
                    <tr>
                        <th scope="col">Transaction Date</th>
                        @if(Auth::user()->role_id == 1)
                            <th scope="col">User ID</th>
                            <th scope="col">Username</th>
                        @endif
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center font-style">

                    @foreach ($transactions->reverse() as $transaction)
                        <tr>
                            <td class="align-middle text-center">
                                Transaction at {{ $transaction->created_at }}
                                @if(Auth::user()->role_id == 1)
                                    <td>{{ $transaction->user->id }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                @endif
                            </td>

                            <td class="align-middle">
                                <a class="btn btn-primary btn-block" href="/transaction/detail/{{ $transaction->id }}">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

        </div>
    @endif

@endsection