{{-- <div class="form-group col-md-4">
    <label for="name">Name <x-backend.form.span-shortcut-tooltip type="Alt" key="N" /></label>
    <input type="text" name="name" id="name" value="{{ old('name') ?? (isset($user) ? $user->name : '') }}"
        class="form-control" placeholder="Enter name">

    <x-backend.form.form-field-error-message name="name" />
</div> --}}


<div class="form-group col-md-4">
    <label for="{{ $name }}">
        {{ $label }}
        @isset($shortcut)
            <x-backend.form.span-shortcut-tooltip :type="$shortcut['type']" :key="$shortcut['key']" />
        @endisset
    </label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) ?? $value }}"
        class="form-control" placeholder="{{ $placeholder }}">
    <x-backend.form.form-field-error-message :name="$name" />
</div>
