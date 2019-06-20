@extends('layouts.basic')
@section('title', "{{ $product->name }}")
@section('content')
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{ asset(config('products.image_path') . $product->image) }}" alt="" />
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                      <a href=""><img src="../layouts/images/product-details/similar1.jpg" alt=""></a>
                      <a href=""><img src="../layouts/images/product-details/similar2.jpg" alt=""></a>
                      <a href=""><img src="../layouts/images/product-details/similar3.jpg" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="../layouts/images/product-details/similar1.jpg" alt=""></a>
                      <a href=""><img src="../layouts/images/product-details/similar2.jpg" alt=""></a>
                      <a href=""><img src="../layouts/images/product-details/similar3.jpg" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="../layouts/images/product-details/similar1.jpg" alt=""></a>
                      <a href=""><img src="../layouts/images/product-details/similar2.jpg" alt=""></a>
                      <a href=""><img src="../layouts/images/product-details/similar3.jpg" alt=""></a>
                    </div>
                    
                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description ? $product->id : '' }}</p>
            <p><span><span>{{ number_format($product->price) }} {{ __('products.pro_currency') }}</span></span></p>
            <p>
                <label>{{ __('products.pro_qty') }}:</label>
                <span><input type="text" value="1" /></span>
                <button type="button" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    {{ __('products.pro_add_to_cart') }}
                </button>
            </p>
            <p><b>{{ __('products.pro_avaible') }}:</b>{{ $product->quantity > 0 ? __('products.status.1') : __('products.status.2') }}</p>
            <p><b>{{ __('products.pro_brand') }}:</b>{{ $product->brand->name }}</p>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
                    
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">{{ __('products.recommended') }}</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php $flag = 0;?>
            @foreach ($recommendPros as $pro)
                @if (($flag % 3) == 0)
                    <div class="item {{ $flag == 0 ? 'active' : ''}}">  
                @endif <?php $flag++; ?>                                   
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset(config('products.image_path') . $pro->image) }}" alt="" />
                                        <h2>{{ number_format($product->price) }}</h2>
                                        <p>{{ $product->name }}</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> {{ __('products.pro_add_to_cart') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>   
                @if (($flag % 3) == 0)
                    </div>
                @endif                
            @endforeach
        </div> </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>          
    </div>
</div><!--/recommended_items-->
@endsection
