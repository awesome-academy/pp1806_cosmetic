@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('user.user_pro') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">{{ __('user.name') }}</div>
                            <div class="col-md-6">{{ $user->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">{{ __('user.email') }}</div>
                            <div class="col-md-6">{{ $user->email }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">{{ __('user.image') }}</div>
                            <div class="col-md-6">{{ $user->image }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">{{ __('user.phone') }}</div>
                            <div class="col-md-6">{{ $user->phone_number }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">{{ __('user.add') }}</div>
                            <div class="col-md-6">{{ $user->address }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
