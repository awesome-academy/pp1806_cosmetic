@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="color: #31b0d5" ><strong>{{ __('user.user_pro') }}</strong></div>

                    <div class="pannel-body">
                        <div class="row">
                            <div class="col-md-4 text-right">{{ __('user.name') }}</div>
                            <div class="col-md-6">{{ $user->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-right">{{ __('user.email') }}</div>
                            <div class="col-md-6">{{ $user->email }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-right">{{ __('user.image') }}</div>
                            <div class="col-md-6">
                                @if(!$user->image)
                                    <img src="https://www.lalintas.com/images/default_profile.png" height="80" width="80">
                                @endif
                                @if($user->image)
                                    <img src="{{ asset("/images/".$user->image) }}" height="80" width="80"/>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-right">{{ __('user.phone') }}</div>
                            <div class="col-md-6">{{ $user->phone_number }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-right">{{ __('user.add') }}</div>
                            <div class="col-md-6">{{ $user->address }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop
