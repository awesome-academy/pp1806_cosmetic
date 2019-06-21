@extends('adminlte::page')

@section('title', __('products.pro_list'))

@section('content_header')
    <h1>{{ __('products.pro_list') }}</h1>
@stop
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('layouts/css/style.css') }}" rel="stylesheet">
@stop
@section('content')
	<!-- Main content -->
	<section class="content">
	   <div class="row">
	       <div class="col-xs-12">
    	        <div class="box">
        	        <div class="box-body">
                        @if (session('status'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="alert alert-success" style="display: none"></div>
                        <div class="alert alert-warning" style="display: none;"></div>

        	           <table id="products" class="table table-bordered table-striped">
        	               <thead>
        	                   <tr>
                	                <th scope="col">#</th>
                	                <th scope="col">{{ __('products.pro_name') }}</th>
                	                <th scope="col">{{ __('products.pro_price') }}</th>
                                    <th scope="col">{{ __('products.pro_brand') }}</th>
                	                <th scope="col">{{ __('products.pro_cat') }}</th>
                	                <th scope="col">{{ __('products.pro_user') }}</th>
                	                <th scope="col">{{ __('products.pro_action') }}</th>
                                </tr>
        	                </thead>
            	            <tbody>
            	            @foreach ($products as $product)
                                <tr class="row_{{ $product->id }}">
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}">{{ $product->name }}</a>
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                      {{ $product->user ? $product->user->name : 'Undefined' }}
                                    </td>
                                    <td class="action-admin">
                                        <a href="products/{{ $product->id }}/edit" class="btn btn-info" role="button">Edit</a>
                                      <a href="#" class="btn btn-danger btn-del-product" role="button" data-product-id="{{ $product->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
            	            </tbody>
            	            <tfoot>
                	            <tr>
                	                <th scope="col">#</th>
                                    <th scope="col">{{ __('products.pro_name') }}</th>
                                    <th scope="col">{{ __('products.pro_price') }}</th>
                                    <th scope="col">{{ __('products.pro_brand') }}</th>
                                    <th scope="col">{{ __('products.pro_cat') }}</th>
                                    <th scope="col">{{ __('products.pro_user') }}</th>
                                    <th scope="col">{{ __('products.pro_action') }}</th>
                                </tr>
            	            </tfoot>
        	            </table>
        	        </div>
        	        <!-- /.box-body -->
    	        </div>
	      <!-- /.box -->
	       </div>
	       <!-- /.col -->
	  </div>
	  <!-- /.row -->
	</section>
	<!-- /.content -->
@stop

@section('js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop
