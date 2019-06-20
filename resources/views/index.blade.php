@extends('layouts.master')

@section('content')
    <div class="alert alert-success {{ !session('success') ? 'hidden' : ''  }}">
        {{ session('success') }}
    </div>
    <!--/slider-->
    @include("layouts.elements.slide")
    <div class="row">        
        <div class="col-sm-12">
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">{{ __('products.features') }}</h2>
                @foreach ($products as $product)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset(config('products.image_path') . $product->image) }}" alt="hihi" height="250" width="250" />
                                        <h2>{{ $product->price }}</h2>
                                        <p><a href="{{ route('product.show', $product->id) }}" class="product-name">{{ $product->name }}</a></p>
                                        <a href="{{ route('product.addToCart', $product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{ __('products.add_to_card') }}</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pull-right">{{ $products->links() }}</div>
                
            </div><!--features_items-->
            
            <div class="category-tab"><!--category-tab-->
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <?php $check = 0 ?>
                            @foreach ($brands as $brand)
                                <li class="{{ $check == 0 ? 'active' : '' }}"><a href="#{{ $brand->id }}" data-toggle="tab"> {{ $brand->name }} </a></li>
                                <?php $check++ ?>
                            @endforeach
                    </ul>
                </div>
                <div class="tab-content">
                    <?php $flag = 0 ?>
                    @foreach ($brands as $brand)
                        <div class="tab-pane fade {{ $flag == 0 ? 'active in' : ''}}" id="{{ $brand->id }}" >
                            @foreach ($brand->products as $product)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ asset(config('products.image_path') . $product->image) }}" alt="hihi" height="250" width="250" />
                                                <h2>{{ $product->price }}</h2>
                                                <p>{{ $product->name }}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{ __('products.add_to_card') }}</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <?php $flag++ ?>
                    @endforeach
                </div>
            </div><!--/category-tab-->
        </div>
    </div>
@endsection
