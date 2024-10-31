@props(['menuName', 'menuBadge', 'menuIcon'])
<li class="menu-item">
    <a href="#menuLayouts" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
        <span class="menu-icon"><i class="{{ $menuIcon }}"></i></span>
        <span class="menu-text"> {{ $menuName }} </span>
        <span class="badge bg-blue ms-auto">{{ $menuBadge }}</span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="menuLayouts">
        <ul class="sub-menu">
            {{ $slot }}
        </ul>
    </div>
</li>
