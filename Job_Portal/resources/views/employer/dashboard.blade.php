<!DOCTYPE html>
<html>
<head>
    <title>Employer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
    <div class="container">
        <h2>Employer Dashboard</h2>
        <p>Welcome, Employer!</p>

        <a href="{{ route('jobs.create') }}" class="btn btn-primary">Add Job</a>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">View Jobs</a>
        <a href="{{ route('applications.index') }}" class="btn btn-info">View Applications</a>
    </div>
</body>
</html>
