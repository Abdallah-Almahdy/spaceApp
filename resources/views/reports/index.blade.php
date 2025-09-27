<!DOCTYPE html>
<html>

<head>
    <title>Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 8px 0;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Available Reports</h1>

    @if ($files->isEmpty())
        <p>No reports found.</p>
    @else
        <ul>
            @foreach ($files as $file)
                <li>
                    {{ basename($file) }}
                    <a href="{{ route('reports.view', basename($file)) }}" target="_blank">View</a> |
                    <a href="{{ route('reports.download', basename($file)) }}">Download</a>
                </li>
            @endforeach
        </ul>
    @endif
</body>

</html>
