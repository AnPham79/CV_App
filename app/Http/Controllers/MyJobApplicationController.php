<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        $jobApplications = JobApplication::where('user_id', auth()->id())->with([
            'job' => function ($query) {
                $query->withCount('jobApplications')
                    ->withTrashed()
                    ->withAvg('jobApplications', 'expected_salary');
            },
            'job.employer'
        ])
        ->latest()
        ->get();

        return view('my_job_applications.index', [
            'jobApplications' => $jobApplications
        ]);
    }


    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with(
            'success',
            'Job application removed.'
        );
    }
}