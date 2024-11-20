@props([
    'navTitle',
    'navIcon',
    'navBadge' => '',
    'navBadgeClass' => '',
    'angleLeft' => false,
    'menu_open' => '',
    'active' => '',
    'href' => '#',
])
<li class="nav-item {{ $menu_open }}">
    <a href="{{ $href }}" class="nav-link {{ $active }}" {{ $attributes }}>
        @if ($navIcon)
            <i class="nav-icon {{ $navIcon }}"></i>
        @endif
        <p>
            {{ $navTitle }}
            @if ($angleLeft)
                <i class="right fas fa-angle-left"></i>
            @endif
            @if ($navBadgeClass)
                <span class="right badge badge-{{ $navBadgeClass }}">{{ $navBadge }}</span>
            @endif

        </p>
    </a>
    {{ $slot }}
</li>
