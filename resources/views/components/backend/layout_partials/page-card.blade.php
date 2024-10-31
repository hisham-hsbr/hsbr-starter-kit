@props(['cardHeader', 'cardSubHeader'])
<div class="card">
    <div class="card-body">
        <h4 class="header-title">{{ $cardHeader }}</h4>
        <p class="sub-header">
            {{ $cardSubHeader }}
        </p>

        {{ $slot }}

    </div> <!-- end card-body -->
</div> <!-- end card-->
