<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Employer::class);
    }
    
    public function store(Request $request)
    {
        $employer = Employer::where('user_id', auth()->user())->get();

        $employer->create(
            $request->validate([
                'company_name' => 'required|unique:employers,company_name'
            ])
        );

        return redirect()->route('jobs.index')->with('success', 'Company has been create successfully !!!');
    }
}
