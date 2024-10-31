@props(['menuName', 'menuBadge', 'menuIcon', 'menuHref'])
<li class="menu-item">
    <a href="{{ $menuHref }}" class="menu-link waves-effect waves-light">
        <span class="menu-icon"><i class="{{ $menuIcon }}"></i></span>
        <span class="menu-text"> {{ $menuName }} </span>
        @if ($menuBadge)
            <span class="rounded badge bg-primary ms-auto">{{ $menuBadge }}</span>
        @endif
    </a>
</li>
