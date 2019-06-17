@extends('adminlte::page')

@section('title', 'Viewing Orders')

@section('content_header')
    <h1>Orders Manager</h1>
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
                    <div class="box-header">
                      <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
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
                                    <th scope="col">{{ __('order.order_user') }}</th>
                                    <th scope="col">{{ __('order.order_price') }}</th>
                                    <th scope="col">{{ __('order.order_desc') }}</th>
                                    <th scope="col">{{ __('order.order_address') }}</th>
                                    <th scope="col">{{ __('order.order_status') }}</th>
                                    <th scope="col">{{ __('order.order_action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr class="row_{{ $order->id }}">
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>
                                        <a href="">{{ $order->user->name }}</a>
                                    </td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->description }}</td>
                                    <td>{{ $order->address_shipping }}</td>
                                    <td>                                         
                                        @switch($order->status)
                                            @case(config('order.cancelled') == $order->status)
                                            <span class="status label label-danger">{{ __('order.status.' . $order->status) }}</span>
                                            @break

                                            @case(config('order.processing') == $order->status)
                                            <span class="status label label-info">{{ __('order.status.' . $order->status) }}</span>
                                            @break

                                            @case(config('order.delivered') == $order->status)
                                            <span class="status label label-success">{{ __('order.status.' . $order->status) }}</span>
                                            @break

                                            @default
                                            <span class="status label label-warning">{{ __('order.status.' . $order->status) }}</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="orders/{{ $order->id }}" class="btn  bg-yellow" role="button"><i class="fa fa-eye"></i></a>
                                        <a href="orders/{{ $order->id }}/edit" class="btn btn-info" role="button"><i class="fa fa-edit"></i></a>
                                      <a href="#" class="btn btn-danger btn-del-order" role="button" data-order-id="{{ $order->id }}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('order.order_user') }}</th>
                                    <th scope="col">{{ __('order.order_price') }}</th>
                                    <th scope="col">{{ __('order.order_desc') }}</th>
                                    <th scope="col">{{ __('order.order_address') }}</th>
                                    <th scope="col">{{ __('order.order_status') }}</th>
                                    <th scope="col">{{ __('order.order_action') }}</th>
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
