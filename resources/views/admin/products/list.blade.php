@extends('adminlte::page')

@section('title', 'Product List')

@section('content_header')
    <h1>Product List</h1>
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
	          <table id="products" class="table table-bordered table-striped">
	            <thead>
	            <tr>
	                <th scope="col">#</th>
	                <th scope="col">Product Name</th>
	                <th scope="col">Price</th>
                    <th scope="col">Brand</th>
	                <th scope="col">Category</th>
	                <th scope="col">User Name</th>
	                <th scope="col">Action</th>
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
                        @if ( $product->user && (auth()->id() == $product->user->id) )
                            <a href="products/{{ $product->id }}/edit" class="btn btn-info" role="button">Edit</a>
                            <a href="#" class="btn btn-info btn-del-product" role="button" data-product-id="{{ $product->id }}">Delete</a>
                        @else 
                            <a href="products/{{ $product->id }}" class="btn btn-info" role="button">View</a>
                        @endif
                      </td>
                    </tr>
                @endforeach
	            </tbody>
	            <tfoot>
	            <tr>
	                <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Category</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Action</th>
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
    <script src="../js/admin_custome.js"></script>
@stop

