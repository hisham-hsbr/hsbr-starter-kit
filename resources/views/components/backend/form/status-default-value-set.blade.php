<div class="custom-control custom-checkbox">
    <input type="checkbox" name="status" id="status" value="1" class="custom-control-input"
    @if (Auth::user()->settings['personal_settings']['value'] == 1) {
            @if (Auth::user()->settings['default_status']['value'] == 1) checked @endif } @else{
        @if ($bootSettings['default_status'] == 1) checked @endif} @endif>
    <label class="custom-control-label" for="status">Is <u>A</u>ctive</label>

    <x-backend.form.form-field-error-message name="status" />
</div>


<x-backend.script.keyboard-shortcut key="a" button_id="status" type="alt" event="focus" />
