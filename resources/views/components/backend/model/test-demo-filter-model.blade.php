@props(['createdByUsers', 'updatedByUsers'])

<div id="filteredData" class="callout callout-info" style="display: none;margin-top: 5px;">
    <h5>Filter Applyed For!</h5>

    <p>
    <div class="row">
        <div id="selectedCodeContainer" class="mt-3 col-md-3" style="display: none;">
            <h6>Code as : <span class="badge badge-info"><span id="selectedCodeLabel"></span></span></h6>
        </div>
        <div id="selectednameContainer" class="mt-3 col-md-3" style="display: none;">
            <h6>Name as : <span class="badge badge-info"><span id="selectednameLabel"></span></span></h6>
        </div>
        <div id="selectedcreatedByContainer" class="mt-3 col-md-3" style="display: none;">
            <h6>CreatedBy as : <span class="badge badge-info"><span id="selectedcreatedByLabel"></span></span>
            </h6>
        </div>
        <div id="selectedupdatedByContainer" class="mt-3 col-md-3" style="display: none;">
            <h6>updatedBy as : <span class="badge badge-info"><span id="selectedupdatedByLabel"></span></span>
            </h6>
        </div>
    </div>

    </p>
    <div class="d-flex justify-content-end">

        <button type="button" class="btn btn-warning" id="resetFiltersBtn">Clear <i
                class="fas fa-filter-circle-xmark"></i></button>
        <button type="button" style="margin-left: 3px" class="btn btn-primary" data-toggle="modal"
            data-target="#filterModal">
            <i class="fas fa-filter"></i></button>
    </div>

</div>
<!-- Button to open the modal with Font Awesome filter icon aligned to the right -->
<div id="filterModalButton" class="mb-3 text-right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterModal">
        <i class="fas fa-filter"></i>
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filter Options</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="myFilter" class="row">
                    @can('{{ $permissionName }} Read Code')
                        <div class="form-group col-sm-6">
                            <label class="col-form-label">Code</label>
                            <input type="text" class="form-control filter-input" id="code" placeholder="Search Code"
                                data-column="2" />
                        </div>
                    @endcan
                    @can('{{ $permissionName }} Read Name')
                        <div class="form-group col-sm-6">
                            <label class="col-form-label">Name</label>
                            <input type="text" class="form-control filter-input" id="name" placeholder="Search Name"
                                data-column="3" />
                        </div>
                    @endcan
                    @can('{{ $permissionName }} Read Created By')
                        <div class="form-group col-sm-6">
                            <label class="col-form-label">Created By</label>
                            <select data-column="6" class="form-control select2 filter-select" id="createdBy">
                                <option value="">Select Created By</option>
                                @foreach ($createdByUsers as $createdByUser)
                                    <option value="{{ $createdByUser }}">{{ $createdByUser }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endcan
                    @can('{{ $permissionName }} Read Updated By')
                        <div class="form-group col-sm-6">
                            <label class="col-form-label">Updated By</label>
                            <select data-column="7" class="form-control select2 filter-select" id="updatedBy">
                                <option value="">Select Updated By</option>
                                @foreach ($updatedByUsers as $updatedByUser)
                                    <option value="{{ $updatedByUser }}">{{ $updatedByUser }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endcan
                </div>
            </div>
            <div class="modal-footer">
                <!-- Apply Filters Button -->
                <button type="button" class="btn btn-primary" id="applyFiltersBtn">Apply Filters</button>
                <!-- Reset Filters Button -->
                <button type="button" class="btn btn-secondary" id="resetFiltersBtn">Reset</button>
            </div>
        </div>
    </div>
</div>
