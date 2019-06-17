@extends('layouts.master')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="step-one">
                <h2 class="heading">{{ __('checkout.review') }}</h2>
            </div>

            <div id="charge-error" class="alert alert-danger {{ !session('error') ? 'hidden' : ''  }}">
                {{ session('error') }}
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">{{ __('cart.item') }}</td>
                            <td class="description"></td>
                            <td class="price">{{ __('cart.price') }}</td>
                            <td class="quantity">{{ __('cart.quantity') }}</td>
                            <td class="total">{{ __('cart.total') }}</td>
                        </tr>
                    </thead>
                     <tbody>
                       @foreach($products as $product)
                           <tr class="row_{{ $product['item']->id }}">
                                <td class="cart_product">
                                    <a href=""><img src="{{ asset('layouts/images') }}/home/product1.jpg" alt=""></a>
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
                                        <input class="cart_quantity_input" type="text" name="quantity_{{ $product['item']->id }}" value="{{$product['quantity']}}" size="2" readonly>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price" data-product-id="{{ $product['item']->id }}">{{ $product['price'] }} VNĐ</p>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>{{ __('checkout.method_payment') }}</td>
                                        <td>{{ __('checkout.ship_cod') }}</td>
                                    </tr>
                                    <tr class="shipping-cost">
                                        <td>{{ __('checkout.shipping_cost') }}</td>
                                        <td>Free</td>                                       
                                    </tr>
                                    <tr>
                                        <td>{{ __('checkout.total') }}</td>
                                        <td><span>{{ __($totalPrice) }}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="shopper-informations">
                <div class="row">
                    <div class="step-one">
                        <h2 class="heading">{{ __('checkout.info_checkout') }}</h2>
                    </div>
                     <form action="{{ route('checkout.store') }}" method="post" id="checkout-form">
                        @csrf
                        <div class="row row-centered">
                            <div class="col-sm-8 col-centered text-center">
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">{{ __('checkout.full_name') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="name" class="form-control" value="{{ $user->name }}" readonly name="name">
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-md-8 col-centered text-center">
                                <div class="form-group">
                                    <label for="address_shipping"  class="col-sm-3 control-label">{{ __('checkout.address_ship') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="address_shipping" class="form-control" required name="address_shipping">
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-sm-8 col-centered text-center">
                                <div class="form-group">
                                     <label for="description"  class="col-sm-3 control-label">{{ __('checkout.notes_shipping') }}</label>
                                    <div class="col-sm-9">
                                        <textarea name="description"  placeholder="{{ __('checkout.notes_placeholder') }}" rows="4"></textarea>
                                    </div>                                    
                                </div>  
                            </div>      
                        </div>
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-default check_out col align-self-center">{{ __('checkout.buy_now') }}</button>
                        </div>
                    </form>                
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->

@endsection
