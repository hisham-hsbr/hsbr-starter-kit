<section class="contact">
    <div class="contact__shape-1">
        <img src="{{ asset('frontend/hsbr/assets/images/shapes/contact-shape-1.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="contact__left">
                    <div class="contact__img">
                        <img src="{{ asset('frontend/hsbr/assets/images/resources/contact-img-1.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="contact__right">
                    <div class="contact__shape-2"></div>
                    <div class="contact__shape-3 float-bob-x">
                        <img src="{{ asset('frontend/hsbr/assets/images/shapes/contact-shape-3.png') }}" alt="">
                    </div>
                    <div class="text-left section-title">
                        <div class="section-title__tagline-box">
                            <span class="section-title__tagline">Contact us</span>
                            <div class="section-title__icon-box-1">
                                <i class="fa fa-angle-left"></i>
                                <i class="fa fa-angle-left"></i>
                                <i class="fa fa-angle-left"></i>
                            </div>
                            <div class="section-title__icon-box-2">
                                <i class="fa fa-angle-right"></i>
                                <i class="fa fa-angle-right"></i>
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </div>
                        <h2 class="section-title__title">Get a Free Quote</h2>
                    </div>
                    <div class="contact__form-box">
                        <form action="{{ asset('frontend/hsbr/assets/inc/sendemail.php') }}"
                            class="contact__form contact-form-validated" novalidate="novalidate">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact__form-input-box">
                                        <input type="text" placeholder="Your name" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact__form-input-box">
                                        <input type="email" placeholder="Email address" name="email">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact__form-input-box">
                                        <input type="text" placeholder="Phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact__form-input-box">
                                        <select class="selectpicker" aria-label="Default select example">
                                            <option selected>Select service</option>
                                            <option value="1">Select service 01</option>
                                            <option value="2">Select service 02</option>
                                            <option value="3">Select service 03</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact__form-input-box text-message-box">
                                        <textarea name="message" placeholder="Write  a message"></textarea>
                                    </div>
                                    <div class="contact__btn-box">
                                        <button type="submit" class="thm-btn contact__btn">Send a
                                            Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
