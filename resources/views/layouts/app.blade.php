<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Student App')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #f2f2f2;
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ccc;
            text-align: left;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .actions button {
            margin-right: 5px;
            padding: 5px 10px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .actions button.delete {
            background-color: #dc3545;
        }

        .actions button:hover {
            opacity: 0.8;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="navbar navbar-expand-lg navbar-primary bg-primary">
        <div class="container">
            <div class="navbar-brand" href="/">Student app</div>
        </div>
    </div>

    <div class="container mb-4">
        @yield('content')
    </div>

    <footer class="bg-light text-center py-3 mt-5">
        <p>&copy; 2025 student App. All rights served.</p>
    </footer>
</body>

</html>
