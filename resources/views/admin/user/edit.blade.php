@extends('layouts.app')

@section('title', 'Edit user')

@section('content_header')
    <!-- <h1>Create new user</h1> -->
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit new user</h3>
                    </div>

                    <form method="POST" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="box-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="alert alert-success" style="display: none"></div>
                            <div class="alert alert-warning" style="display: none;"></div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('user.name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('user.email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }} row">
                                <label for="{{ $errors->has('image') ? 'inputError' : 'image' }}" class="col-md-4 col-form-label text-md-right">

                                    @error('image')
                                        <span class="fa fa-times-circle-o">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{ __('user.image') }}
                                </label>

                                <div class="col-sm-6">
                                    <input type="file" value="{{ old('image', $user->image) }}" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image">

                                    @error('image')
                                    <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('user.phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" value="{{ old('phone_number', $user->phone_number) }}" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" required>

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{__('user.add')}}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" value="{{ old('address', $user->address) }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('user.update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop
