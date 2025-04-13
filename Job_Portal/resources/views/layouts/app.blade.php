<!DOCTYPE html>
<html>
<head>
    <title>Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('employer.dashboard') }}">Employer Dashboard</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
