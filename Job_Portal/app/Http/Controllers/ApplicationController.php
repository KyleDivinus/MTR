<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $jobs = Job::when($search, function ($query, $search) {
                $query->where('title', 'like', "%$search%")
                      ->orWhere('company_name', 'like', "%$search%");
            })
            ->get();

        return view('job_seeker.index', compact('jobs', 'search'));
    }

    public function applyForm(Job $job)
    {
        return view('job_seeker.apply', compact('job'));
    }

    public function submitApplication(Request $request, Job $job)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'application_letter' => 'required|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        Application::create([
            'job_id' => $job->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'application_letter' => $validated['application_letter'],
            'resume_path' => $resumePath,
        ]);

        return redirect()->route('job_seeker.index')->with('success', 'Application submitted successfully.');
    }

    // For Employer to view all applications
    public function viewApplications()
    {
        $applications = Application::with('job')->latest()->get();
        return view('employer.applications.index', compact('applications'));
    }
}
