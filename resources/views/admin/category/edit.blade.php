@extends('adminlte::page')

@section('title', 'Edit category')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('category.cat')}}</h6>
        </div>
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                <form role="form" action="{{ route('category.store') }}" method="post">
                    @csrf
                    <fieldset class="form-group">
                        <label>{{__('category.name')}}</label>
                        <input class="form-control" name="name" placeholder="{{__('category.add_cat_name')}}">
                    </fieldset>
                    <button type="submit" class="btn btn-success">{{__('category.submit')}}</button>
                    <button type="reset" class="btn btn-primary">{{__('category.reset')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
