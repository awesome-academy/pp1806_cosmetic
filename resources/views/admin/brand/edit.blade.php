@extends('adminlte::page')

@section('title', 'Edit brand')

@section('content_header')
    <!-- <h1>Create new brand</h1> -->
@stop

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit new brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.brand.update', $brand->id) }}" class="form-horizontal">
                        @csrf
                        <div class="box-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="alert alert-success" style="display: none"></div>
                            <div class="alert alert-warning" style="display: none;"></div>
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} ">
                                <label for="{{ $errors->has('name') ? 'inputError' : 'name' }}" class="col-sm-3 control-label">
                                    @if ($errors->has('name'))
                                        <i class="fa fa-times-circle-o"></i>
                                    @endif
                                    {{ __('Brand Name') }}
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" type="text" class="form-control" id="{{ $errors->has('name') ? 'inputError' : '' }}" name="name" value="{{ $brand->name }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary pull-right">{{ __('Create') }}</button>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop

