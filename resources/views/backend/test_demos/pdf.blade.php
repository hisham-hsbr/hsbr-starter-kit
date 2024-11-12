<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A4 Page Template</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }

        .status-badge {
            padding: 5px 10px;
            color: white;
            border-radius: 5px;
        }

        .active-badge {
            background-color: green;
        }

        .default-badge {
            background-color: blue;
        }

        .content-box {
            border: 1px solid #ccc;
            padding: 20px;
        }

        .text-pink {
            color: #ff69b4;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <p>This item is
            <span class="status-badge active-badge">Active</span>
            <span class="status-badge default-badge">Default</span>
        </p>
        <div class="content-box">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Name</strong> : <span class="text-pink">Iphone 7 Pro Max 64Gb</span></p>
                    <p><strong>Status</strong> : <span class="text-pink">Active</span></p>
                    <p><strong>Updated At</strong> : <span class="text-pink">11-Nov-2024 01:37 PM (America/Toronto)
                            (live)</span></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Local Name</strong> : <span class="text-pink">Iphone 7 Pro Max 64Gb</span></p>
                    <p><strong>Created At</strong> : <span class="text-pink">02-Nov-2024 02:10 PM (America/Toronto)
                            (live)</span></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
