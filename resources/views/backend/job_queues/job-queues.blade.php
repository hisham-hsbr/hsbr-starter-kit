<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Queues</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <h1>Job Queues</h1>

    <!-- Tabs for Pending and Failed Jobs -->
    <ul>
        <li><a href="#" onclick="loadDataTable('pending')">Pending Jobs</a></li>
        <li><a href="#" onclick="loadDataTable('failed')">Failed Jobs</a></li>
    </ul>

    <table id="jobsTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Queue</th>
                <th>Payload/Exception</th>
                <th>Attempts/Failed At</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        let currentRoute = '/jobs/pending'; // Default route for pending jobs

        // Initialize DataTable
        function loadDataTable(type) {
            switch (type) {
                case 'pending':
                    currentRoute = '/jobs/pending';
                    break;
                case 'failed':
                    currentRoute = '/jobs/failed';
                    break;
            }

            // Destroy existing DataTable before re-initializing
            if ($.fn.DataTable.isDataTable('#jobsTable')) {
                $('#jobsTable').DataTable().destroy();
            }

            // Reinitialize DataTable
            $('#jobsTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: currentRoute,
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'queue'
                    },
                    {
                        data: 'decoded_payload',
                        render: function(data, type, row) {
                            return JSON.stringify(data, null, 2) || row.formatted_exception ||
                                '-'; // Pretty-print payload or exception
                        },
                    },
                    {
                        data: 'attempts',
                        render: function(data, type, row) {
                            return row.attempts || row.failed_at || '-';
                        },
                    },
                    {
                        data: 'created_at',
                        render: function(data, type, row) {
                            return row.created_at || '-';
                        },
                    }
                ]
            });
        }

        // Load default DataTable on page load
        $(document).ready(function() {
            loadDataTable('pending');
        });
    </script>
</body>

</html>
