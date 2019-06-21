@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-10">
            <div class="features_items item">
                @foreach ($products as $product)
                    <div class="col-sm-3 pad06">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset(config('products.image_path') . $product->image) }}" alt="hihi" height="250" width="250"/>
                                    <h2>{{ $product->price }}</h2>
                                    <p><a href="{{ route('product.show', $product->id) }}" class="product-name">{{ $product->name }}</a></p>
                                    <a href="{{ route('product.addToCart', $product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{ __('products.add_to_card') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop