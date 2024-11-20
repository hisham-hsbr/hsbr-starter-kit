<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Initialize a counter to assign unique IDs to rows
    let rowIdCounter = 1;

    function previewFile(event) {
        const file = event.target.files[0];
        if (!file || !file.name.match(/\.(xls|xlsx)$/)) {
            toastr.error("Please upload a valid Excel file.");

            $('#data').val('');
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, {
                type: 'array'
            });
            const sheetName = workbook.SheetNames[0];
            const sheet = workbook.Sheets[sheetName];
            const jsonData = XLSX.utils.sheet_to_json(sheet, {
                header: 1
            });
            displayPreviewTable(jsonData);
        };
        reader.readAsArrayBuffer(file);
    }

    function displayPreviewTable(data) {
        const headers = data[0];
        window.tableHeaders = headers;

        const tableHead = document.getElementById('tableHead');
        const tableBody = document.getElementById('tableBody');
        tableHead.innerHTML = headers.map(header => `<th>${header}</th>`).join('') + '<th>Action</th>';
        tableBody.innerHTML = '';

        for (let i = 1; i < data.length; i++) {
            const row = data[i];
            let rowHtml = row.map(cell =>
                `<td><input type="text" class="form-control cell-input" value="${cell || ''}"></td>`).join('');
            rowHtml +=
                `<td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>`;

            // Assign an ID to each row and increment the counter
            tableBody.insertAdjacentHTML('beforeend', `<tr data-row-id="${rowIdCounter++}">${rowHtml}</tr>`);
        }

        document.getElementById('tablePreviewContainer').style.display = 'block';
    }

    function addRow() {
        const tableBody = document.getElementById('tableBody');

        // Create a new blank row with empty input fields
        let newRow = window.tableHeaders.map(() =>
            `<td><input type="text" class="form-control cell-input" value=""></td>`).join('');

        // Add the remove button to the new row
        newRow +=
            `<td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>`;

        // Append the new row to the table body without resetting existing rows
        tableBody.insertAdjacentHTML('beforeend', `<tr data-row-id="${rowIdCounter++}">${newRow}</tr>`);
    }

    function removeRow(button) {
        button.closest('tr').remove();
    }

    function submitForm() {
        clearErrors();

        const tableData = [];
        $('#previewTable tbody tr').each(function() {
            const rowData = {};
            const rowId = $(this).data('row-id'); // Retrieve the row ID
            rowData.id = rowId; // Add the row ID to the data

            $(this).find('.cell-input').each(function(index) {
                rowData[window.tableHeaders[index]] = $(this).val();
            });
            tableData.push(rowData);
        });

        $.ajax({
            url: '{{ route('test.demos.upload') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                table_data: JSON.stringify(tableData)
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message_success);

                    window.location.href = response.redirect_url; // Redirect to the URL
                }
            },
            error: function(xhr) {
                const messageErrors = xhr.responseJSON.message_errors;
                displayErrors(messageErrors);
            }
        });
    }

    function clearErrors() {
        $('.text-danger').remove();
        $('.cell-input').removeClass('border-danger');
    }

    function displayErrors(messageErrors) {
        $('#previewTable tbody tr').each(function(rowIndex) {
            $(this).find('.cell-input').each(function(cellIndex) {
                const fieldName = window.tableHeaders[cellIndex];
                const errorMessages = messageErrors[`${rowIndex}.${fieldName}`];
                if (errorMessages) {
                    $(this).addClass('border-danger');
                    $(this).after(`<div class="text-danger">${errorMessages.join(', ')}</div>`);
                    toastr.error(errorMessages.join(', '));

                }
            });
        });
    }
</script>
