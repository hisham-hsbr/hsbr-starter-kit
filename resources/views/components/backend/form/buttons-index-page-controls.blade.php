@props(['routeName', 'model'])
<div class="btn-group">
    <button type="button" class="btn btn-info">Action</button>
    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" role="menu">
        {{-- <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalForm">add T</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a> --}}

        <!-- Add Button -->
        <a href="{{ route($routeName . '.create') }}" class="btn btn-block btn-outline-primary btn-xs"><i
                class="fas fa-plus"></i> Add </a>

        <!-- Export Button -->
        <a href="{{ route($routeName . '.create') }}" class="btn btn-block btn-outline-success btn-xs"><i
                class="fas fa-file-export"></i> Export
        </a>

        <!-- Import Button -->
        <a href="{{ route($routeName . '.import') }}" class="btn btn-block btn-outline-info btn-xs"><i
                class="fas fa-file-import"></i> Import
        </a>

        <!-- Settings Button -->
        <a href="{{ route('settings.model.settings', encrypt($model)) }}"
            class="btn btn-block btn-outline-secondary btn-xs"><i class="fas fa-cog"></i> Settings </a>

        <!-- Refresh Button -->
        <a onclick="Refresh()" class="btn btn-block btn-outline-warning btn-xs"><i class="fas fa-sync-alt"></i> Refresh
        </a>




    </div>
</div>












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
