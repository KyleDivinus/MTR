@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Applications</h1>

    @if($applications->isEmpty())
        <p>No applications found.</p>
    @else
        @foreach($applications as $application)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $application->job->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $application->name }} ({{ $application->email }})</h6>
                    <p><strong>Application Letter:</strong></p>
                    <p>{{ $application->application_letter }}</p>
                    <p><strong>Resume:</strong> <a href="{{ Storage::url($application->resume_path) }}" target="_blank">View Resume</a></p>
                    <p><strong>Status:</strong> {{ ucfirst($application->status) }}</p>
                    <a href="{{ route('applications.show', $application->id) }}" class="btn btn-info">View Details</a>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
