@extends('adminlte::page')

@section('title', 'Category List')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('category.cat')}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="category" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>{{__('category.stt')}}</th>
                        <th>{{__('category.name')}}</th>
                        <th>{{__('category.edit')}}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>{{__('category.stt')}}</th>
                        <th>{{__('category.name')}}</th>
                        <th>{{__('category.edit')}}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($category as $key => $value)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>
                                <button class="btn btn-primary edit" title="{{__('category.edit').$value->name }}" data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}">{{__('category.edit')}}</button>
                                <button class="btn btn-danger delete" title="{{__('category.del').$value->name }}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}">{{__('category.del')}}</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('category.edit_cat')}} <span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            <form role="form">
                                <fieldset class="form-group">
                                    <label>{{__('category.name')}}</label>
                                    <input class="form-control name" name="name" placeholder="{{__('category.add_cat_name')}}">
                                    <span class="error" style="color: red;font-size: 1rem;"></span>
                                </fieldset>
                                <div class="form-group">
                                    <label>{{__('category.sta')}}</label>
                                    <select class="form-control status" name="status">
                                        <option value="1" class="ht">{{__('category.display')}}</option>
                                        <option value="0" class="kht">{{__('category.not_display')}}</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success update">{{__('category.save')}}</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('category.cancel')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('category.sure')}}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success del">{{__('category.yes')}}</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('category.no')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop
