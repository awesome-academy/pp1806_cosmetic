@extends('adminlte::page')

@section('title', 'Product List')

@section('content_header')
    <h1>Product List</h1>
@stop
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
	<!-- Main content -->
	<section class="content">
	   <div class="row">
	       <div class="col-xs-12">
    	        <div class="box">
        	        <div class="box-header">
        	          <h3 class="box-title">Data Table With Full Features</h3>
        	        </div>
        	        <!-- /.box-header -->
        	        <div class="box-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
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
                                        <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                      {{ $product->user ? $product->user->name : 'Undefined' }}
                                    </td>
                                    <td>
                                        <a href="products/{{ $product->id }}/edit" class="btn btn-info" role="button">Edit</a>
                                        <a href="products/{{ $product->id }}" class="btn btn-info" role="button">View</a>
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

