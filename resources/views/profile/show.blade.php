@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="color: #FE980F">{{ __('user.user_pro') }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4 text-right"><strong>{{ __('user.name') }}</strong></div>
                                <div class="col-md-6">{{ $user->name }}</div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 text-right"><strong>{{ __('user.email') }}</strong></div>
                                <div class="col-md-6">{{ $user->email }}</div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 text-right"><strong>{{ __('user.image') }}</strong></div>
                                <div class="col-md-6"><img src="{{ asset("/images/".$user->image) }}" height="80" width="80"/></div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 text-right"><strong>{{ __('user.phone') }}</strong></div>
                                <div class="col-md-6">{{ $user->phone_number }}</div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 text-right"><strong>{{ __('user.add') }}</strong></div>
                                <div class="col-md-6">{{ $user->address }}</div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary" role="button">{{ __('user.edit') }}</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection()