<footer class="site-footer">
    <div class="site-footer__bg" style="background-image: url(assets/images/backgrounds/site-footer-bg.png);">
    </div>
    <div class="container">
        <div class="site-footer__top">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__logo">
                            <a href="index.html"><img src="{{ asset('app/images/logo/hsbr_logo_icon.png') }}"
                                    height="70" width="70" alt="" style="margin-right: 10px;"></a>
                            <a href="index.html"><img src="{{ asset('app/images/logo/hsbr_logo_name_w.png') }}"
                                    height="55" width="175" alt=""></a>
                        </div>
                        <p class="footer-widget__about-text">Welcome to HSBR Enterprise, because it is
                            pain, but occasionally circumstances.</p>
                        <div class="site-footer__social">
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
                <div class="col-xl-2 col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__link">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Explore</h3>
                        </div>
                        <ul class="footer-widget__link-list list-unstyled">
                            <li><a href="about.html">About Company</a></li>
                            <li><a href="team.html">Meet the Team</a></li>
                            <li><a href="blog.html">News & Media</a></li>
                            <li><a href="projects.html">Our Projects</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                    <div class="footer-widget__column footer-widget__Contact">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Contact</h3>
                        </div>
                        <p class="footer-widget__Contact-text">{{ $bootSettings['hsbr_contact_address'] }}
                        </p>
                        <ul class="footer-widget__Contact-list list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="fas fa-envelope"></span>
                                </div>
                                <div class="text">
                                    <a
                                        href="mailto:{{ $bootSettings['hsbr_contact_email'] }}">{{ $bootSettings['hsbr_contact_email'] }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="fas fa-phone-square"></span>
                                </div>
                                <div class="text">
                                    <a
                                        href="tel:{{ str_replace(' ', '', $bootSettings['hsbr_contact_phone']) }}">{{ $bootSettings['hsbr_contact_phone'] }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="fab fa-whatsapp"></span>
                                </div>
                                <div class="text">
                                    <a href="https://wa.me/{{ str_replace(' ', '', $bootSettings['hsbr_contact_phone']) }}"
                                        target="_blank">
                                        {{ $bootSettings['hsbr_contact_phone'] }}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                    <div class="footer-widget__column footer-widget__newsletter">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Newsletter</h3>
                        </div>
                        <div class="footer-widget__newsletter-form-box">
                            <form class="footer-widget__newsletter-form mc-form" data-url="MC_FORM_URL"
                                novalidate="novalidate">
                                <div class="footer-widget__newsletter-form-input-box">
                                    <input type="email" placeholder="Email Address" name="EMAIL">
                                    <button type="submit" class="footer-widget__newsletter-btn"><span
                                            class="fas fa-paper-plane"></span></button>
                                </div>
                            </form>
                            <div class="mc-form__response"></div>
                            <div class="checked-box">
                                <input type="checkbox" name="skipper1" id="skipper" checked="">
                                <label for="skipper"><span></span>I agree to all your terms and
                                    policies</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <p class="site-footer__bottom-text">© Copyright <?php echo date('Y'); ?> by <a
                                href="{{ $bootSettings['developer_company_website'] }}"
                                target="_blank">{{ $bootSettings['developer_company_name'] }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
