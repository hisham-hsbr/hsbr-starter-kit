@props(['routeName'])
<button type="submit" id="saveButton" class="float-right ml-1 btn btn-primary"><u>S</u>ave</button>
<a type="button" id="backButton" href="{{ route($routeName . '.index') }}"
    class="float-right ml-1 btn btn-warning"><u>B</u>ack</a>


<x-backend.script.keyboard-shortcut key="s" button_id="saveButton" type="ctrl&alt" event="click" />
<x-backend.script.keyboard-shortcut key="b" button_id="backButton" type="ctrl&alt" event="click" />
