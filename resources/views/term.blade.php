@extends('layouts.master')

@section('content')
    <div class="lineFix">
        <h4>{{ __('term.shipping_title') }}</h4>
    </div>

    <div class="row pad">
        <div class="col-xs-12 shipTable">
            <div class="table-responsive hidden-xs lineFix">
                <table class="table">
                    <thead>
                    <tr>
                        <td class="firstCol">{{ __('term.method') }}</td>
                        <td>{{ __('term.cost') }}</td>
                        <td class="lastCol">{{ __('term.expect') }}</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ __('term.standard') }}</td>
                        <td>{{ __('term.free') }}</td>
                        <td>{{ __('term.time') }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('term.2') }}</td>
                        <td>{{ __('term.special') }}</td>
                        <td>{{ __('term.2days') }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('term.over_night') }}</td>
                        <td>{{ __('term.over_cost') }}</td>
                        <td>{{ __('term.over_time') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="shipDisclaimers" class="col-xs-12">
        {{ __('term.shipping_content1') }}<br>
        {{ __('term.shipping_content2') }}<br>
        {{ __('term.shipping_content3') }}<br>
        <br>
        <h4>{{ __('term.out_stock') }}</h4>
        {{ __('term.shipping_content4') }}<br>
    </div>

    <div class="col-xs-12" style="margin-top: 20px">
        <h4 class="rtrnTop">{{ __('term.return') }}</h4>

        <div id="hbox" class="pull-right">
            <img src="{{ asset('/images/moneyback.jpg') }}">
        </div>
        <p>{{ __('term.return_content1') }}<b>{{ __('term.return_content2') }}</b>{{ __('term.return_content3') }}</p>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="font-family: 'Martel', sans-serif; margin-bottom: 20px">
        <div id="zbox" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center" style="border: 1px solid #e06435; padding: 20px 45px;float: left">
            <div class="col-md-pull-2">
                <div class="col-md-pull-2">
                    <div>
                        <p id="days">{{ __('term.0') }}</p>
                        <p>{{ __('term.content1') }}<br>{{ __('term.content2') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="zbox" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center" style="border: 1px solid #e06435; padding: 20px 45px">
            <div class="col-md-pull-2">
                <div class="col-md-pull-2">
                    <div>
                        <p id="days">{{ __('term.30') }}</p>
                        <p>{{ __('term.content3') }}<br>{{ __('term.content4') }}</p><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection