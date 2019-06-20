@extends('layouts.master')

@section('content')
    {{--comment--}}
    <div class="suntory-row-full-width" style="padding:  40px 0 40px 0; background-image: url('https://i.etsystatic.com/isbl/f7e893/27611735/isbl_1680x420.27611735_gmn4hkg8.jpg?version=0'); background-size: cover;background-position: center;">
        <div class="wpb_text_column wpb_content_element  abouts-heading-title">
            <div class="wpb_wrapper">
                <h1 class="tu fs__20" style="text-align: center; font-size: 50px; color: #fff"><strong>{{ __('contact.bici') }}</strong></h1>
                <p style="text-align: center; font-family: 'Martel', sans-serif; font-size: 20px; color: #fff; max-width: 600px;margin: 0 auto">{{ __('contact.content_banner') }}</p>
            </div>
        </div>
    </div>

    <div class="hidden-xs col-sm-6" style="padding: 50px 0 20px;">
        <img src="{{ asset("/images/about-us.jpg") }}" class="img-responsive about-us-img">
    </div>

    <div class="col-xs-12 col-sm-6 aboutUs" style="font-family: 'Martel', sans-serif">
        <h2 style="color: #fdb45e; font-size: 50px; padding: 50px 0 20px; margin-top: 80px">{{ __('contact.about_us') }}</h2>
        <p style="color: #333333; font-size: 20px; margin-top: 50px">{{ __('contact.content_about') }}</p>
    </div>

    <div class="col-xs-10 col-xs-offset-1" style="text-align: center; font-family: 'Martel', sans-serif">
        <h2 style="color: #fdb45e; font-size: 50px; margin-top: 60px">{{ __('contact.why') }}</h2>
        <p style="font-weight: bold; font-size: 20px; color: #333333"><strong>{{ __('contact.why_title') }}</strong></p>
        <p style="font-size: 20px; color: #333333">{{ __('contact.why_content') }}</p>
    </div>

    <div class="col-xs-12" style="margin: auto; padding: 50px 0 0 80px">
        <img src="{{ asset("/images/why-shop.jpg") }}" class="img-responsive">
    </div>

    <div class="row">
        <div class="col-sm-6" style="font-family: 'Martel', sans-serif; padding: 20px 0 40px">
            <h2 style="color: #fdb45e; font-size: 50px; margin-top: 60px">{{ __('contact.info') }}</h2>
            <p style="font-size: 20px; color: #333333">
                <b class="highlight" style="font-weight: bold; font-size: 20px; color: #333333">{{ __('contact.bici') }}</b>
                <br>{{ __('contact.add') }}
                <br>{{ __('contact.add1') }}
            </p>
            <p style="font-size: 20px; color: #333333">
                <i class="fa fa-phone"></i> <a href="tel:0123456789" style="color: #fdb45e">0123456789</a>
                <span class="gdoc">| </span>
                <i class="fa fa-envelope-o"></i> <a href="mailto:admin@bici.com" style="color: #fdb45e">admin@bici.com</a>
            </p>
            <b class="highlight" style="font-weight: bold; font-size: 20px; color: #333333">{{ __('contact.hour') }}</b>
            <p style="font-size: 20px; color: #333333">
                {{ __('contact.monTofri') }}
                <br>{{ __('contact.sat') }}
            </p>
            <em style="font-size: 20px; color: #333333">{{ __('contact.look') }}</em>
        </div>

        <div class="col-sm-6" style="padding: 40px 0 40px">
            <img src="{{ asset("/images/store.jpg") }}" class="img-responsive about-us-img">

        </div>

    </div>
    {{--end comment--}}
@endsection