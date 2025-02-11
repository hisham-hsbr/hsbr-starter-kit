<!DOCTYPE html>
<html lang="en">

<head>

    @include('hsbr_frontend.layouts.head')

</head>

<body class="custom-cursor">
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        <strong>Notice:</strong> The website is currently under maintenance. Some features may not work as expected.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->


    <div class="page-wrapper">
        <header class="main-header">

            @include('hsbr_frontend.layouts.header')

        </header>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!-- Main Sllider Start -->
        @if ($bootSettings['hsbr_frontend_layout_main_slider'] == 1)
            @include('hsbr_frontend.layouts.sections.main_slider')
        @endif

        <!--Main Sllider Start -->

        <!--Services One Start -->
        @if ($bootSettings['hsbr_frontend_layout_services'] == 1)
            @include('hsbr_frontend.layouts.sections.services')
        @endif

        <!--Services One End -->

        <!--Trust One Start -->
        @if ($bootSettings['hsbr_frontend_layout_trust'] == 1)
            @include('hsbr_frontend.layouts.sections.trust')
        @endif

        <!--Trust One End -->

        <!--About One Start -->
        @if ($bootSettings['hsbr_frontend_layout_about'] == 1)
            @include('hsbr_frontend.layouts.sections.about')
        @endif
        <!--About One End-->

        <!--Video One Start-->
        @if ($bootSettings['hsbr_frontend_layout_video'] == 1)
            @include('hsbr_frontend.layouts.sections.video')
        @endif
        <!--Video One End-->

        <!--Feature One Start-->
        @if ($bootSettings['hsbr_frontend_layout_feature'] == 1)
            @include('hsbr_frontend.layouts.sections.feature')
        @endif
        <!--Feature One End-->

        <!--FAQ One Start-->
        @if ($bootSettings['hsbr_frontend_layout_faq'] == 1)
            @include('hsbr_frontend.layouts.sections.faq')
        @endif
        <!--FAQ One End-->

        <!--Team One Start-->
        @if ($bootSettings['hsbr_frontend_layout_team'] == 1)
            @include('hsbr_frontend.layouts.sections.team')
        @endif
        <!--Team One End-->

        <!--Why Choose One Start-->
        @if ($bootSettings['hsbr_frontend_layout_why_choose'] == 1)
            @include('hsbr_frontend.layouts.sections.why_choose')
        @endif
        <!--Why Choose One End-->

        <!--Project One Start-->
        @if ($bootSettings['hsbr_frontend_layout_projects'] == 1)
            @include('hsbr_frontend.layouts.sections.projects')
        @endif
        <!--Project One End-->

        <!--Testimonial One Start-->
        @if ($bootSettings['hsbr_frontend_layout_testimonial'] == 1)
            @include('hsbr_frontend.layouts.sections.testimonial')
        @endif
        <!--Testimonial One End-->

        <!--Brand partners One Start-->
        @if ($bootSettings['hsbr_frontend_layout_brand_partners'] == 1)
            @include('hsbr_frontend.layouts.sections.brand_partners')
        @endif
        <!--Brand partners One End-->

        <!--Contact One Start-->
        @if ($bootSettings['hsbr_frontend_layout_contact_us'] == 1)
            @include('hsbr_frontend.layouts.sections.contact_us')
        @endif
        <!--Contact One End-->

        <!--Blog One Start-->
        @if ($bootSettings['hsbr_frontend_layout_blog'] == 1)
            @include('hsbr_frontend.layouts.sections.blog')
        @endif
        <!--Blog One End-->

        <!--CTA One Start-->
        @if ($bootSettings['hsbr_frontend_layout_contact_now'] == 1)
            @include('hsbr_frontend.layouts.sections.contact_now')
        @endif
        <!--CTA One End-->

        <!--Site Footer Start-->
        @include('hsbr_frontend.layouts.footer')
        <!--Site Footer End-->


    </div><!-- /.page-wrapper -->


    @include('hsbr_frontend.layouts.mobile_navbar')
    <!-- /.mobile-nav__wrapper -->

    @include('hsbr_frontend.layouts.search_popup')
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-up-arrow"></i></a>


    @include('hsbr_frontend.layouts.footer_links')
</body>

</html>
