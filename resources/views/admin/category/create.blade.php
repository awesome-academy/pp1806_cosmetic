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
                    <form method="POST" action="{{ route('admin.category.store') }}" class="form-horizontal">
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

                        <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }} ">
                            <label for="{{ $errors->has('parent_id') ? 'inputError' : 'parent_id' }}" class="col-sm-3 control-label">
                                @if ($errors->has('parent_id'))
                                    <i class="fa fa-times-circle-o"></i>
                                @endif
                                {{ __('parent_id') }}
                            </label>

                            <div class="col-sm-9">
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a Parent ID"

                                        style="width: 100%;"id="{{ $errors->has('parent_id') ? 'inputError' : 'parent_id' }}" name="parent_id">
                                    @foreach ($category as $categories)
                                        @if($categories->parent_id == 0)
                                        <option value="{{ $categories->id }}">{{ $categories->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if ($errors->has('parent_id'))
                                    <span class="help-block">{{ $errors->first('parent_id') }}</span>
                                @endif
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
