@extends('layouts.app')
@section('title', 'All User')

@section('css')

@section('content')

    <div class="container">
        <h1 class="text-center pt-3 pb-3">All User PHizza Hut!</h1>
        <div class="container pt-5 pl-5 pr-5">
            <div class="row row-cols-1 row-cols-md-3 justify-content-center">

                @foreach ($users as $user)
                    <div class="col-mb-4">
                        <div class="card bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header regis-header">User ID : {{$user->id}}</div>
                            <div class="card-body">
                                <p class="card-text">Username : {{$user->name}}</p>
                                <p class="card-text">Email : {{$user->email}}</p>
                                <p class="card-text">Address : {{$user->address}}</p>
                                <p class="card-text">Phone Number : {{$user->phone_number}}</p>
                                <p class="card-text">Gender : {{$user->gender}}</p>
                            </div>
                            @if ($user->role_id == 1)
                                <div class="card-footer bg-warning">Admin</div>
                            @else
                                <div class="card-footer bg-secondary">Member</div>
                            @endif
                        </div> 
                    </div>
                @endforeach

            </div>
        </div>

        <div class="row justify-content-center pt-5 pb-4">
            <div class="div col-md-2">
                {{ $users->links() }}
            </div>
        </div>

    </div>

@endsection