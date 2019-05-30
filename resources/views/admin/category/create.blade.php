@extends('adminlte::page')

@section('title', 'Add new category')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('category.cre_cat')}}</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} ">
                                <label for="{{ $errors->has('name') ? 'inputError' : 'name' }}" class="col-sm-3 control-label">
                                    @if ($errors->has('name'))
                                        <i class="fa fa-times-circle-o"></i>
                                    @endif
                                    {{ __('Category Name') }}
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" type="text" class="form-control" id="{{ $errors->has('name') ? 'inputError' : '' }}" name="name" value="{{ old('name') }}" autofocus>
                                    @error('name')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary pull-right">{{ __('Create') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop
