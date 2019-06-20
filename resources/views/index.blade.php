@extends('layouts.master')

@section('content')
    <div class="alert alert-success {{ !session('success') ? 'hidden' : ''  }}">
        {{ session('success') }}
    </div>
    <!--/slider-->
    @include("layouts.elements.slide")
    <div class="row">


        <div class="col-sm-12">
            <div class="album py-5 bg-light">
                <div class="container">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-9 float-right" id="orderBy"><h5>Order by:</h5></div>
                        <div class="col-md-3">

                            <select class="form-control" id="order">
                                <option value="1" {{ $selected[1] ? 'selected' : '' }}>Created at</option>
                                <option value="2" {{ $selected[2] ? 'selected' : '' }}>Price increase</option>
                                <option value="3" {{ $selected[3] ? 'selected' : '' }}>Price decrease</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">{{ __('products.features') }}</h2>
                @foreach ($products as $product)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        @if(!$product->image)
                                            <img src="https://hani.vn/wp-content/uploads/2019/01/trang-diem.jpg" height="250" width="250">
                                        @endif
                                        @if($product->image)
                                            <img src="{{ asset("/images/".$product->image) }}" height="250" width="250"/>
                                        @endif
                                        <h2>{{ number_format($product->price) }} {{ __('products.pro_currency') }}</h2>
                                        <p><a href="{{ route('product.show', $product->id) }}" class="product-name">{{ $product->name }}</a></p>
{{--                                        <img src="{{ asset(config('products.image_path') . $product->image) }}" alt="hihi" height="250" width="250" />--}}
                                        <a href="{{ route('product.addToCart', $product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{ __('products.add_to_card') }}</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pull-right">{{ $products->appends(['orderBy' => $orderBy, 'type' => $type])->links() }}</div>

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
                                                <h2>{{ number_format($product->price) }} {{ __('products.pro_currency') }}</h2>
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

@section('js')
    <script src="{{ asset('js/filter.js') }}"></script>
@endsection
