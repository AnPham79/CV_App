<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    public function index()
    {
        $this->authorize('viewAnyEmployer', Job::class);
        return view(
            'my_job.index',
            [
                'jobs' => auth()->user()->employer
                    ->jobs()
                    ->with(['employer', 'jobApplications', 'jobApplications.user'])
                    ->withTrashed()
                    ->get()
            ]
        );
    }

    public function create()
    {
        $this->authorize('create', Job::class);
        return view('my_job.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Job::class);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:' . implode(',', Job::$experience),
            'languages' => 'required|in:' . implode(',', Job::$languages)
        ]);

        auth()->user()->employer->jobs()->create($validatedData);

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job created successfully.');
    }

    public function edit(Job $myJob)
    {
        $this->authorize('update', $myJob);
        return view('my_job.edit', ['job' => $myJob]);
    }

    public function update(UpdateJobRequest $request, Job $myJob)
    {
        $this->authorize('update', $myJob);
        $myJob->update($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $myJob)
    {
        $myJob->delete();

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job deleted.');
    }
}
