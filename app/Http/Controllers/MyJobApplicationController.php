<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobApplication;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        // return view('my_job_applications.index', [
        //     'applications' => auth()->user()->jobApplications()->latest()->get()
        // ]);
    }

    public function destroy(string $id)
    {
        //
    }
}