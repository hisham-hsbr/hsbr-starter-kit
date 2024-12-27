<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pdfName }} - {{ $paperSize }}</title>
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

        .logo {
            width: 100px;
            /* Adjust width as needed */
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <!-- Logo Section -->
        <div class="text-center">
            <img src="{{ $logoBase64 }}" alt="Logo" class="logo">
        </div>

        <!-- Content Section -->
        <div style="padding-bottom: 3px"> This item is {!! $testDemo->status_with_icon !!}</div>
        <div class="content-box">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Name</strong> : <span class="text-pink">{{ $testDemo->name }}</span></p>
                    <p><strong>Local Name</strong> : <span class="text-pink">{{ $testDemo->local_name }}</span></p>
                    <p><strong>Status</strong> : <span class="text-pink">{{ $testDemo->status }}</span></p>
                    <p><strong>Created At</strong> : <span class="text-pink">{{ $testDemo->created_at }}</span></p>
                    <p><strong>Updated At</strong> : <span class="text-pink">{{ $testDemo->updated_at }}</span></p>
                </div>
            </div>
        </div>
        <div style="text-align: right;">
            <code>Printed at :
                {{ \Carbon\Carbon::now()->setTimezone(Auth::user()->timeZone->time_zone)->format('d-M-Y h:i:s A') }}
                <small>({{ Auth::user()->timeZone->time_zone }}_{{ Auth::user()->timeZone->utc_code }})</small>
            </code>
        </div>
    </div>
</body>

</html>
