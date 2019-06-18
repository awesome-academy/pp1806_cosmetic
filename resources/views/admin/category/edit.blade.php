@extends('adminlte::page')

@section('title', 'Edit category')

@section('content')
    {{--<div class="card shadow mb-4">--}}
        {{--<div class="card-header py-3">--}}
            {{--<h6 class="m-0 font-weight-bold text-primary">{{__('category.cat')}}</h6>--}}
        {{--</div>--}}
        {{--<div class="row" style="margin: 5px">--}}
            {{--<div class="col-lg-12">--}}
                {{--<form role="form" action="{{ route('category.store') }}" method="post">--}}
                    {{--@csrf--}}
                    {{--<fieldset class="form-group">--}}
                        {{--<label>{{__('category.name')}}</label>--}}
                        {{--<input class="form-control" name="name" placeholder="{{__('category.add_cat_name')}}">--}}
                    {{--</fieldset>--}}
                    {{--<button type="submit" class="btn btn-success">{{__('category.submit')}}</button>--}}
                    {{--<button type="reset" class="btn btn-primary">{{__('category.reset')}}</button>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.category.update', ['category' => $category->id]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{ old('name', $category->name) }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus>
                                    @error('name')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
