<!-- start page title -->
@props(['pageTitle'])
<div class="py-3 py-lg-4">
    <div class="row">
        @section('pageTitle')
        @show
        <div class="col-lg-6">
            <div class="d-none d-lg-block">
                @section('page_breadcrumb')
                @show
            </div>
        </div>
    </div>
</div>
<!-- end page title -->






@section('main_content')

@show
