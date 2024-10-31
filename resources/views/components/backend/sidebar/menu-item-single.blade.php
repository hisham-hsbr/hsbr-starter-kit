@props(['itemName', 'itemHref', 'itemBadge'])
<li class="menu-item">
    <a href="{{ $itemHref }}" class="menu-link">
        <span class="menu-text">{{ $itemName }}</span>
        @if ($itemBadge)
            <span class="rounded badge bg-primary ms-auto">{{ $itemBadge }}</span>
        @endif
    </a>
</li>
