<h3>{{ $model }} History</h3>
<div style="border-style: groove;" class="p-3 form-group">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Sn</th>
                <th>Event</th>
                <th>Properties</th>
                <th>User</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($activityLog as $activity)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $activity->event }}</td>
                    <td>
                        <!-- Trigger button to open modal -->
                        <a type="button" class="" data-toggle="modal"
                            data-target="#propertiesModal{{ $loop->iteration }}">
                            View Properties
                        </a>

                        <!-- Modal for Properties -->
                        <div class="modal fade" id="propertiesModal{{ $loop->iteration }}" tabindex="-1" role="dialog"
                            aria-labelledby="propertiesModalLabel{{ $loop->iteration }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="propertiesModalLabel{{ $loop->iteration }}">
                                            Properties
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            @foreach ($activity->properties as $key => $value)
                                                @if ($key == 'attributes')
                                                    <div class="pt-2 col-md-6">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2"
                                                                        class="bg-secondary color-palette">
                                                                        New {{ $activity->event }}
                                                                        {{ $activity->log_name }}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($value as $lists => $data)
                                                                    <tr class="bg-light color-palette">
                                                                        <td style="color:red; width: 10%">
                                                                            {{ $lists }}
                                                                        </td>
                                                                        <td>{{ $data }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endif
                                                @if ($key == 'old')
                                                    <div class="pt-2 col-md-6">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2"
                                                                        class="bg-secondary color-palette">
                                                                        Old {{ $activity->log_name }}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($value as $lists => $data)
                                                                    <tr class="bg-light color-palette">
                                                                        <td style="color:red; width: 10%">
                                                                            {{ $lists }}
                                                                        </td>
                                                                        <td>{{ $data }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                    <td>{{ $activity->activityUser->name }}</td>
                    <td>{{ $activity->created_at_formatted }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">{{ $model }} History not available</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th>Sn</th>
                <th>Event</th>
                <th>Properties</th>
                <th>User</th>
                <th>Created At</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            // Optional: Customization options for DataTables
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "search": "Search:",
                "lengthMenu": "Show _MENU_ entries",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "paginate": {
                    "previous": "Previous",
                    "next": "Next"
                }
            }
        });
    });
</script>
