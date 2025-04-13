<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobSeekerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $jobs = Job::when($search, function ($query, $search) {
                return $query->where('title', 'like', "%$search%")
                    ->orWhere('company_name', 'like', "%$search%");  // Updated for company_name field
            })
            ->latest()
            ->get();

        return view('job_seeker.index', compact('jobs', 'search'));
    }

    public function apply(Job $job)
    {
        return view('job_seeker.apply', compact('job'));
    }

    public function submit(Request $request, Job $job)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
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
            'status' => 'pending',  // Assuming status is to be tracked, adjust as necessary
        ]);

        // Fixing the redirect route to 'job_seeker.index'
        return redirect()->route('job_seeker.index')->with('success', 'Application submitted successfully!');
    }
}
