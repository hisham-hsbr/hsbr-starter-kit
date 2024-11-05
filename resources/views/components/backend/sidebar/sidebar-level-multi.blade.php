@props([
    'navTitle',
    'navIcon',
    'navBadge' => '',
    'navBadgeClass' => '',
    'angleLeft' => false,
    'href' => '#',
    'active' => '',
    'menu_open' => '',
])
<ul class="nav nav-treeview">
    <li class="nav-item {{ $menu_open }}">
        <a href="{{ $href }}" class="nav-link {{ $active }}">
            @if ($navIcon)
                <i class="nav-icon {{ $navIcon }}"></i>
            @endif
            {{ $navTitle }}
            @if ($angleLeft)
                <i class="right fas fa-angle-left"></i>
            @endif
            @if ($navBadgeClass)
                <span class="right badge badge-{{ $navBadgeClass }}">{{ $navBadge }}</span>
            @endif
        </a>
        {{ $slot }}
    </li>
</ul>




{{-- style="margin-left: 5px" --}}

{{-- <li class="nav-item menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-tree"></i>
        <p>
            UI Elements
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="../UI/general.html" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>General</p>
            </a>
        </li>
    </ul>
</li> --}}
