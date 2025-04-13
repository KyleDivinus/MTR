<!DOCTYPE html>
<html>
<head>
    <title>Job Portal System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="text-center">
        <h1 class="mb-4">Welcome to the Job Portal</h1>
        <a href="{{ route('employer.dashboard') }}" class="btn btn-primary btn-lg m-2">I'm an Employer</a>
        <a href="{{ route('jobseeker.dashboard') }}" class="btn btn-success btn-lg m-2">I'm a Job Seeker</a>
    </div>
</body>
</html>
