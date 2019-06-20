@extends('adminlte::page')

@section('title', 'Edit product')

@section('content_header')
    <!-- <h1>Create new product</h1> -->
@stop

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Edit new product</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" class="form-horizontal">
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
                                    {{ __('Product Name') }}
                                </label>

                                <div class="col-sm-9">
                                    <input id="name" type="text" class="form-control" id="{{ $errors->has('name') ? 'inputError' : '' }}" name="name" value="{{ $product->name }}" autofocus>

                                    @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }} ">
                                <label for="{{ $errors->has('category_id') ? 'inputError' : 'category_id' }}" class="col-sm-3 control-label">
                                    @if ($errors->has('category_id'))
                                        <i class="fa fa-times-circle-o"></i> 
                                    @endif
                                    {{ __('Category') }}
                                </label>

                                <div class="col-sm-9">
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a Category"
                                        style="width: 100%;"id="{{ $errors->has('category_id') ? 'inputError' : 'category_id' }}" name="category_id" value="{{ $product->category->id }}">
                                    @foreach ($categories as $category)  
                                        <option value="{{ $category->id }}" <?php if ($product->category->id == $category->id) echo "selected" ?>>{{ $category->name}}</option>
                                    @endforeach
                                    </select>                               
                                    @if ($errors->has('category_id'))
                                    <span class="help-block">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group {{ $errors->has('brand_id') ? 'has-error' : '' }} ">
                                <label for="{{ $errors->has('brand_id') ? 'inputError' : 'brand_id' }}" class="col-sm-3 control-label">
                                    @if ($errors->has('brand_id'))
                                        <i class="fa fa-times-circle-o"></i> 
                                    @endif
                                    {{ __('Brand') }}
                                </label>

                                <div class="col-sm-9">
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a Brand"
                                        style="width: 100%;"id="{{ $errors->has('brand_id') ? 'inputError' : 'brand_id' }}" name="brand_id" value="{{ $product->brand->id }}">
                                    @foreach ($brands as $brand)  
                                        <option value="{{ $brand->id }}" <?php if ($product->brand->id == $brand->id) echo "selected" ?>>{{ $brand->name}}</option>
                                    @endforeach
                                    </select>

                                    @if ($errors->has('brand_id'))
                                    <span class="help-block">{{ $errors->first('brand_id') }}</span>
                                    @endif
                                </div>
                            </div>    

                            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }} ">
                                <label for="{{ $errors->has('price') ? 'inputError' : 'price' }}" class="col-sm-3 control-label">
                                    @if ($errors->has('price'))
                                        <i class="fa fa-times-circle-o"></i> 
                                    @endif
                                    {{ __('Price') }}
                                </label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id=" {{ $errors->has('price') ? 'inputError' : 'price' }}" name="price" value="{{ $product->price }}">

                                    @if ($errors->has('price'))
                                    <span class="help-block">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }} ">
                                <label for="{{ $errors->has('image') ? 'inputError' : 'image' }}" class="col-sm-3 control-label">
                                    @if ($errors->has('image'))
                                        <i class="fa fa-times-circle-o"></i> 
                                    @endif
                                    {{ __('Image') }}
                                </label>

                                <div class="col-sm-9">
                                    <input type="file"  name="image" value="{{ old('image', $product->image) }}" class="form-control-file" id="image">

                                    @if ($errors->has('image'))
                                    <span class="help-block">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('image_list') ? 'has-error' : '' }} ">
                                <label for="{{ $errors->has('image_list') ? 'inputError' : 'image_list' }}" class="col-sm-3 control-label">
                                    @if ($errors->has('image_list'))
                                        <i class="fa fa-times-circle-o"></i> 
                                    @endif
                                    {{ __('Image List') }}
                                </label>

                                <div class="col-sm-9">
                                    <input type="file"  name="image_list" value="{{ old('image_list', $product->image_list) }}" class="form-control-file" id="image_list">

                                    @if ($errors->has('image_list'))
                                    <span class="help-block">{{ $errors->first('image_list') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary pull-right">{{ __('Update') }}</button>
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

