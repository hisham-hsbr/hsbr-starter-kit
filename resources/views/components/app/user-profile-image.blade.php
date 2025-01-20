<img src="
    @if (empty(Auth::user()->avatar)) @if (Auth::user()->gender == 'male') {{ asset('app/images/avatars/male.png') }} @endif
        @if (Auth::user()->gender == 'female') {{ asset('app/images/avatars/female.png') }} @endif
        @if (Auth::user()->gender == '') {{ asset('app/images/avatars/avatar.png') }} @endif
@else
{{ asset('/storage/' . Auth::user()->avatar) }} @endif
    "
    {{ $attributes->merge(['class' => 'img-circle elevation-2', 'style' => 'font-size: 6px', 'alt' => 'user image', 'width' => '35']) }}>
