<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.head')
</head>

<body>
    <!-- Pre-loader Start -->
    @include('frontend.layouts.pre_loader')
    <!-- Pre-loader End -->

    <!-- Navbar Area Start -->
    @include('frontend.layouts.navbar')
    <!-- Navbar Area End -->

    @section('main_content')
    @show

    <!-- Footer Section Start -->
    @include('frontend.layouts.footer')
    <!-- Footer Section End -->


</body>

</html>
