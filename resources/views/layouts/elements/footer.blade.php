<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <a href="/"><img src="{{ asset("images/logo-bici-1.png") }}" alt="BiCi Cosmetic" height="70px" width="105px" /></a>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="col-sm-2">
                        <div class="video-gallery text-center">
                            <a href="{{ route('contact') }}">
                                <div class="img-fluid">
                                    <img src="{{ asset("/images/contactus.jpg") }}" alt="" />
                                </div>
                            </a>
                            <a href="{{ route('contact') }}">
                                <h5 style="color: #fdb45e; font-size: 20px; margin-top: 20px">{{ __('contact.contact') }}</h5>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="video-gallery text-center">
                            <a href="{{ route('term') }}">
                                <div class="img-fluid">
                                    <img src="{{ asset("/images/term.png") }}" alt="" />
                                </div>
                            </a>
                            <a href="{{ route('term') }}">
                                <h5 style="color: #fdb45e; font-size: 20px; margin-top: 20px">{{ __('term.term') }}</h5>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="img-fluid">
                                    <img src="{{ asset("/images/download.png") }}" alt="" />
                                </div>
                            </a>
                            <a href="#">
                                <h5 style="color: #fdb45e; font-size: 20px; margin-top: 20px">{{ __('footer.qa') }}</h5>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-offset-4 col-sm-offset-1" style="margin-top: 30px">
                        <div class="pull-right">
                            <h2 style="color: #fdb45e">{{ __('footer.about') }}</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="{{ __('footer.email') }}" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>{{ __('footer.about_content1') }}<br />{{ __('footer.about_content2') }}</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p style="text-align: center"><strong>{{ __('footer.copy') }}</strong></p>
                {{--<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>--}}
            </div>
        </div>
    </div>
    
</footer><!--/Footer-->
