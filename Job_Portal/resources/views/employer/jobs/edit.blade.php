@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Job: {{ $job->title }}</h2>

    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" name="company_name" class="form-control" value="{{ $job->company_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" name="title" class="form-control" value="{{ $job->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="5" required>{{ $job->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="{{ $job->location }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Salary</label>
            <input type="number" step="0.01" name="salary" class="form-control" value="{{ $job->salary }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Job</button>
    </form>
</div>
@endsection
