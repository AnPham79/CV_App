<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Job::class);
        $filters = $request->only([
            'search',
            'min_salary',
            'max_salary',
            'experience',
            'languages',
            'location',
        ]);

        return view('job.index', ['jobs' => Job::filter($filters)->get()]);
    }

    public function show(Job $job)
    {
        $this->authorize('view', $job);
        return view(
            'job.show',
            ['job' => $job->load('employer')],
            ['job' => $job->load('employer.jobs')]
        );
    }
}
