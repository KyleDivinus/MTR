@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Apply for: {{ $job->title }}</h1>
    <h5 class="text-muted mb-4">Company: {{ $job->company_name ?? 'Unknown' }}</h5>

    <form action="{{ route('job_seeker.submit', $job->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Your Full Name</label>
            <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="application_letter" class="form-label">Application Letter</label>
            <textarea class="form-control" name="application_letter" rows="5" required>{{ old('application_letter') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="resume" class="form-label">Upload Resume (PDF, DOC, DOCX)</label>
            <input type="file" class="form-control" name="resume" accept=".pdf,.doc,.docx" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</div>
@endsection
