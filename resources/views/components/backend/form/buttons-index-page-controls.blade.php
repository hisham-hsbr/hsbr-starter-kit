@props(['routeName', 'model', 'settings'])
<div class="btn-group">
    <button type="button" class="btn btn-info">Action</button>
    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" role="menu">
        <!-- Add Button -->
        <a href="{{ route($routeName . '.create') }}" id="addButton" class="btn btn-block btn-outline-primary btn-xs"><i
                class="fas fa-plus"></i> Add </a>

        <!-- Export Button -->
        <a href="{{ route($routeName . '.create') }}" class="btn btn-block btn-outline-success btn-xs"><i
                class="fas fa-file-export"></i> Export
        </a>

        <!-- Import Button -->
        <a href="{{ route($routeName . '.import') }}" class="btn btn-block btn-outline-info btn-xs"><i
                class="fas fa-file-import"></i> Import
        </a>



        <!-- Refresh Button -->
        <a onclick="Refresh()" id="refreshButton" class="btn btn-block btn-outline-warning btn-xs"><i
                class="fas fa-sync-alt"></i> Refresh
        </a>




    </div>
</div>






<x-backend.script.keyboard-shortcut key="a" button_id="addButton" type="ctrl&alt" event="click" />
<x-backend.script.keyboard-shortcut key="r" button_id="refreshButton" type="ctrl&alt" event="click" />
<x-backend.script.keyboard-shortcut key="s" button_id="settingsButton" type="ctrl&alt" event="click" />





{{-- <div id="indexPageButtons" style="margin-bottom: 5px">
    <!-- Add Button -->
    <a href="{{ route($routeName . '.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add
    </a>

    <!-- Export Button -->
    <a href="{{ route($routeName . '.create') }}" class="btn btn-success">
        <i class="fas fa-file-export"></i> Export
    </a>

    <!-- Import Button -->
    <a href="{{ route($routeName . '.create') }}" class="btn btn-info">
        <i class="fas fa-file-import"></i> Import
    </a>

    <!-- Settings Button -->
    <a href="{{ route($routeName . '.create') }}" class="btn btn-secondary">
        <i class="fas fa-cog"></i> Settings
    </a>

    <!-- Refresh Button -->
    <a onclick="Refresh()" class="btn btn-warning">
        <i class="fas fa-sync-alt"></i> Refresh
    </a>
</div> --}}
