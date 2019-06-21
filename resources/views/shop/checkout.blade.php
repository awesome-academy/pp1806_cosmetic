@extends('layouts.master')
@section('title', __('checkout.title') )
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
                                    <a href=""><img src="{{ asset(config('products.image_path') . $product['item']->image) }}" style="width: 200px" alt=""></a>
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
                                        <td><p class="cart_sum_total_price" data-product-id="{{ $product['item']->id }}">{{ number_format($totalPrice) }} {{ __('products.pro_currency') }}</p></td></td>
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
                                    <label for="{{ $errors->has('name') ? 'inputError' : 'name' }}" class="col-sm-3 control-label inputError">
                                        @if ($errors->has('name'))
                                            <i class="fa fa-times-circle-o"></i> 
                                        @endif
                                        {{ __('checkout.full_name') }}
                                    </label>

                                    <div class="col-sm-9">
                                        <input id="name" type="text" class="form-control" id="{{ $errors->has('name') ? 'inputError' : '' }}" name="name" value="{{ $user->name }}"  readonly>

                                        @if ($errors->has('name'))
                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>                               
                                </div>
                            </div>
                            <div class="col-sm-8 col-centered text-center">
                                <div class="form-group">
                                    <label for="{{ $errors->has('phone_number') ? 'inputError' : 'phone_number' }}" class="col-sm-3 control-label inputError">
                                        @if ($errors->has('phone_number'))
                                            <i class="fa fa-times-circle-o"></i> 
                                        @endif
                                        {{ __('checkout.phone_number') }}
                                    </label>

                                    <div class="col-sm-9">
                                        <input id="phone_number" type="text" class="form-control" id="{{ $errors->has('phone_number') ? 'inputError' : '' }}" name="phone_number" value="{{ $user->phone_number }}" >

                                        @if ($errors->has('phone_number'))
                                        <span class="help-block">{{ $errors->first('phone_number') }}</span>
                                        @endif
                                    </div>                    
                                </div>
                            </div>
                            <div class="col-md-8 col-centered text-center">
                                <div class="form-group">
                                    <label for="{{ $errors->has('address_shipping') ? 'inputError' : 'address_shipping' }}" class="col-sm-3 control-label inputError">
                                        @if ($errors->has('address_shipping'))
                                            <i class="fa fa-times-circle-o"></i> 
                                        @endif
                                        {{ __('checkout.address_ship') }}
                                    </label>

                                    <div class="col-sm-9">
                                        <input id="address_shipping" type="text" class="form-control" id="{{ $errors->has('address_shipping') ? 'inputError' : '' }}" name="address_shipping" value="{{ $user->address_shipping }}" >

                                        @if ($errors->has('address_shipping'))
                                        <span class="help-block">{{ $errors->first('address_shipping') }}</span>
                                        @endif
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
                        <div class="col-sm-12 text-center checkout-button">
                            <a class="btn btn-default update" href="{{ route('product.shoppingCart') }}">{{ __('checkout.back') }}</a>
                            <button type="submit" class="btn btn-default check_out col align-self-center">{{ __('checkout.complete_order') }}</button>
                        </div>
                    </form>                
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->

@endsection
