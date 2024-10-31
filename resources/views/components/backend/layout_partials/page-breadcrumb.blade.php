@props(['activePage'])
<ol class="m-0 breadcrumb float-end">
    {{ $slot }}
    <li class="breadcrumb-item active">{{ $activePage }}</li>
</ol>
