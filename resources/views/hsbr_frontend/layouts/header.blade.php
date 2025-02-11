<div class="main-header__top">
    <div class="main-header__top-inner">
        <div class="main-header__top-left">
            <ul class="list-unstyled main-header__contact-list">
                <li>
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="text">
                        <p>
                            <a
                                href="mailto:{{ $bootSettings['hsbr_contact_email'] }}">{{ $bootSettings['hsbr_contact_email'] }}</a>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <i class="fas fa-map-marker"></i>
                    </div>
                    <div class="text">
                        <p>{{ $bootSettings['hsbr_contact_address'] }}</p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="main-header__top-right">
            <ul class="list-unstyled main-header__top-menu">
                <li><a href="about.html">About</a></li>
                <li><a href="about.html">Help</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <div class="main-header__social-box">
                <h4 class="main-header__social-title">Follow on:</h4>
                <div class="main-header__social">
                    @if ($bootSettings['hsbr_twitter_link'] != '#')
                        <a href="{{ $bootSettings['hsbr_twitter_link'] }}" target="_blank"><i
                                class="fab fa-twitter"></i></a>
                    @endif
                    @if ($bootSettings['hsbr_facebook_link'] != '#')
                        <a href="{{ $bootSettings['hsbr_facebook_link'] }}" target="_blank"><i
                                class="fab fa-facebook"></i></a>
                    @endif
                    @if ($bootSettings['hsbr_pinterest_link'] != '#')
                        <a href="{{ $bootSettings['hsbr_pinterest_link'] }}" target="_blank"><i
                                class="fab fa-pinterest-p"></i></a>
                    @endif
                    @if ($bootSettings['hsbr_instagram_link'] != '#')
                        <a href="{{ $bootSettings['hsbr_instagram_link'] }}" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                    @endif
                    @if ($bootSettings['hsbr_youtube_link'] != '#')
                        <a href="{{ $bootSettings['hsbr_youtube_link'] }}" target="_blank"><i
                                class="fab fa-youtube"></i></a>
                    @endif
                    @if ($bootSettings['hsbr_whatsapp_link'] != '#')
                        <a href="{{ $bootSettings['hsbr_whatsapp_link'] }}" target="_blank"><i
                                class="fab fa-whatsapp"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="main-menu">
    <div class="main-menu__wrapper">
        <div class="main-menu__wrapper-inner">
            <div class="main-menu__left">
                <div class="main-menu__logo">
                    <a href="index.html"><img src="{{ asset('app/images/logo/hsbr_logo_name_w.png') }}" height="45"
                            width="165" alt=""></a>
                </div>
                <div class="main-menu__main-menu-box">
                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                    @include('hsbr_frontend.layouts.top_navbar')
                </div>
            </div>
            <div class="main-menu__right">
                <div class="main-menu__call">
                    <div class="main-menu__call-icon">
                        <img src="{{ asset('frontend/hsbr/assets/images/icon/main-menu-call-icon-1.png') }}"
                            alt="">
                    </div>
                    <div class="main-menu__call-content">
                        <p class="main-menu__call-sub-title">Call Helpline</p>
                        <h5 class="main-menu__call-number"><a
                                href="tel:{{ str_replace(' ', '', $bootSettings['hsbr_contact_phone']) }}">{{ $bootSettings['hsbr_contact_phone'] }}</a>
                        </h5>
                    </div>
                </div>
                <div class="main-menu__search-cart-box">
                    <div class="main-menu__search-box">
                        <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>
                    </div>
                    <div class="main-menu__cart-box">
                        <a href="cart.html" class="main-menu__cart icon-shopping-cart"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
