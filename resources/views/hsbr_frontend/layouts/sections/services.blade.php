<section class="services-one">
    <div class="container">
        <div class="services-one__inner">
            <div class="services-one__shape-2 float-bob-x">
                <img src="{{ asset('frontend/hsbr/assets/images/shapes/services-one-shape-2.png') }}" alt="">
            </div>
            <div class="services-one__shape-3">
                <img src="{{ asset('frontend/hsbr/assets/images/shapes/services-one-shape-3.png') }}" alt="">
            </div>
            <div class="services-one__shape-4">
                <img src="{{ asset('frontend/hsbr/assets/images/shapes/services-one-shape-4.png') }}" alt="">
            </div>
            <div class="services-one__top">
                <ul class="list-unstyled services-one__list">
                    <!--Services One Single Start-->
                    <li>
                        <div class="services-one__single">
                            <div class="services-one__plus">
                                <a href="#"><span class="icon-plus"></span></a>
                            </div>
                            <div class="services-one__content">
                                <div class="services-one__shape-1">
                                    <img src="{{ asset('frontend/hsbr/assets/images/shapes/services-one-shape-1.png') }}"
                                        alt="">
                                </div>
                                <div class="services-one__icon">
                                    <span class="icon-online-shopping"></span>
                                </div>
                                <h3 class="services-one__title"><a href="#">Mobile <br>
                                        Applications</a></h3>
                            </div>
                        </div>
                    </li>
                    <!--Services One Single End-->
                    <!--Services One Single Start-->
                    <li>
                        <div class="services-one__single">
                            <div class="services-one__plus">
                                <a href=""><span class="icon-plus"></span></a>
                            </div>
                            <div class="services-one__content">
                                <div class="services-one__shape-1">
                                    <img src="{{ asset('frontend/hsbr/assets/images/shapes/services-one-shape-1.png') }}"
                                        alt="">
                                </div>
                                <div class="services-one__icon">
                                    <span class="icon-growth"></span>
                                </div>
                                <h3 class="services-one__title"><a href="#">Digital <br>
                                        Marketing</a></h3>
                            </div>
                        </div>
                    </li>
                    <!--Services One Single End-->
                    <!--Services One Single Start-->
                    <li>
                        <div class="services-one__single">
                            <div class="services-one__plus">
                                <a href=""><span class="icon-plus"></span></a>
                            </div>
                            <div class="services-one__content">
                                <div class="services-one__shape-1">
                                    <img src="{{ asset('frontend/hsbr/assets/images/shapes/services-one-shape-1.png') }}"
                                        alt="">
                                </div>
                                <div class="services-one__icon">
                                    <span class="icon-webpage"></span>
                                </div>
                                <h3 class="services-one__title"><a href="#">Graphic <br>
                                        Designing</a></h3>
                            </div>
                        </div>
                    </li>
                    <!--Services One Single End-->
                    <!--Services One Single Start-->
                    <li>
                        <div class="services-one__single">
                            <div class="services-one__plus">
                                <a href=""><span class="icon-plus"></span></a>
                            </div>
                            <div class="services-one__content">
                                <div class="services-one__shape-1">
                                    <img src="{{ asset('frontend/hsbr/assets/images/shapes/services-one-shape-1.png') }}"
                                        alt="">
                                </div>
                                <div class="services-one__icon">
                                    <span class="icon-front-end"></span>
                                </div>
                                <h3 class="services-one__title"><a href="#">Web <br>
                                        Development</a></h3>
                            </div>
                        </div>
                    </li>
                    <!--Services One Single End-->
                    <!--Services One Single Start-->
                    <li>
                        <div class="services-one__single">
                            <div class="services-one__plus">
                                <a href=""><span class="icon-plus"></span></a>
                            </div>
                            <div class="services-one__content">
                                <div class="services-one__shape-1">
                                    <img src="{{ asset('frontend/hsbr/assets/images/shapes/services-one-shape-1.png') }}"
                                        alt="">
                                </div>
                                <div class="services-one__icon">
                                    <span class="icon-bullhorn"></span>
                                </div>
                                <h3 class="services-one__title"><a href="#">Social <br>
                                        Marketing</a></h3>
                            </div>
                        </div>
                    </li>
                    <!--Services One Single End-->
                </ul>
            </div>
            <div class="services-one__bottom">
                <div class="services-one__satisfied">
                    <ul class="list-unstyled services-one__satisfied-list">
                        <li>
                            <div class="services-one__satisfied-img">
                                <img src="{{ asset('frontend/hsbr/assets/images/services/services-one-satisfied-img-1-1.jpg') }}"
                                    alt="">
                            </div>
                        </li>
                        <li>
                            <div class="services-one__satisfied-img">
                                <img src="{{ asset('frontend/hsbr/assets/images/services/services-one-satisfied-img-1-2.jpg') }}"
                                    alt="">
                            </div>
                        </li>
                        <li>
                            <div class="services-one__satisfied-img">
                                <img src="{{ asset('frontend/hsbr/assets/images/services/services-one-satisfied-img-1-3.jpg') }}"
                                    alt="">
                            </div>
                        </li>
                    </ul>
                    @if ($bootSettings['hsbr_satisfied_customers_count'])
                        <div class="services-one__satisfied-content count-box">
                            <p class="services-one__satisfied-text">We’ve <span class="count-text"
                                    data-stop="{{ $bootSettings['hsbr_satisfied_customers_count'] }}"
                                    data-speed="1500">00</span> satisfied customers with our
                                services. <a href="#">Let’s Get Started</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
