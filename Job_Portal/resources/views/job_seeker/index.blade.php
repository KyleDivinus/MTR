@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Job Listings</h1>

    <form method="GET" action="{{ route('job_seeker.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search jobs or companies...">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    @if($jobs->isEmpty())
        <p>No jobs found.</p>
    @else
        @foreach($jobs as $job)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $job->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $job->company_name ?? 'Unknown Company' }}</h6> <!-- Updated this line -->
                    <p class="card-text">{{ $job->description }}</p>
                    <p class="card-text"><strong>Location:</strong> {{ $job->location }}</p>
                    <a href="{{ route('job_seeker.apply', $job->id) }}" class="btn btn-success">Apply</a>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
