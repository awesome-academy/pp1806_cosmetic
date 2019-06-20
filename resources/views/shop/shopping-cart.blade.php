@extends('layouts.master')

@section('title')
    Cosmetic Shopping Cart
@endsection

@section('content')
    <section id="cart_items">
        @if(Session::has('cart'))
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <div class="alert alert-success" style="display: none"></div>
                <div class="alert alert-warning" style="display: none;"></div>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">{{ __('cart.item') }}</td>
                            <td class="description"></td>
                            <td class="price">{{ __('cart.price') }}</td>
                            <td class="quantity">{{ __('cart.quantity') }}</td>
                            <td class="total">{{ __('cart.total') }}</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($products as $product)
                           <tr class="row_{{ $product['item']->id }}">
                                <td class="cart_product">
                                    <a href=""><img src="{{ asset(config('products.image_path') . $product['item']->image) }}" alt="" style="width: 200px"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $product['item']->name }}</a></h4>
                                    <p>Web ID: {{ $product['item']->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ $product['item']->price }} VNĐ</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" data-product-id="{{ $product['item']->id }}" role="button"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity_{{ $product['item']->id }}" value="{{$product['quantity']}}" size="2" readonly>
                                        <a class="cart_quantity_down" data-product-id="{{ $product['item']->id }}" role="button"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price" data-product-id="{{ $product['item']->id }}">{{ $product['price'] }} VNĐ</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" data-product-id="{{ $product['item']->id }}" role="button"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">
                            <span>
                                <a class="btn btn-default update" href="{{ url('/')}}">{{ __('cart.continue') }}</a>
                            </span>

                            </td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tbody>
                                    <tr>
                                        <td>Tổng :</td>
                                        <td><p class="cart_sum_total_price" data-product-id="{{ $product['item']->id }}">{{ $totalPrice }} VNĐ</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('product.deleteCartAll')}}" class="btn btn-default delete-cart-all" role="button"><i class="fa fa-trash-o"></i> {{ __('cart.delete') }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('checkout.index')}}" class="btn btn-default check_out" role="button">{{ __('cart.checkout') }}</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <h2>No Items in Cart!</h2>
                </div>
            </div>
        @endif
    </section> <!--/#cart_items-->
@endsection
@section('js')
    <script src="{{ asset('js/cart.js') }}"></script>
@stop
