@props(['pageName', 'pageHref', 'active' => false])
@if ($active)
    <li class="breadcrumb-item active">{{ $pageName }}</li>
@else
    <li class="breadcrumb-item"><a href="{{ $pageHref }}">{{ $pageName }}</a></li>
@endif
