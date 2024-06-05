<x-layout>
    <div>
        <nav class="mb-4">
            <ul class="flex space-x-4 text-slate-500">
                <li>
                    <a href="{{ route('jobs.index') }}">Home</a>
                </li>
                <li>/</li>
                <li>My Job Applications</a></li>
            </ul>
        </nav>

        @forelse ($jobApplications as $application)
            <div class="cart-job my-5 py-4 border border-y-stone-300">
                <div class="flex justify-between">
                    <h2 class="text-lg font-medium">{{ $application->job->title }}</h2>
                    <div class="text-slate-500 text-sm">{{ number_format($application->job->salary) }} VND</div>
                </div>
            
                <div class="my-2">
                    <p class="text-sm"><b>Short description:</b></p>
                    <p class="text-sm text-slate-500">{!! nl2br(e($application->job->short_description)) !!}</p>
                </div>
            
                <div class="mb-4 mt-4 flex justify-between text-sm text-slate-500">
                    <div class="">
                        <div class="font-sm"><b>Company name: </b>{{ $application->job->employer->company_name }}</div>
                        <div class="font-sm"><b>location: </b>{{ $application->job->location }}</div>
                    </div>
                    <div class="flex space-x-1 text-xs">
                        <x-tag>
                            <b>Ex: </b>{{ $application->job->experience }}
                        </x-tag>
                        <x-tag>
                            <b>Language: </b>{{ $application->job->languages }}
                        </x-tag>
                    </div>
                </div>

                <div class="flex justify-between mt-2">
                    <div class="right">
                        <p class="text-sm text-slate-500">The salary you want: 
                            {{ number_format($application->expected_salary) }} VND</p>
                        <p class="text-sm text-slate-500">Time application: 
                            {{ $application->created_at->diffForHumans() }}</p>
                        <p class="text-sm text-slate-500">
                            Average asking salary: 
                            {{ number_format($application->job->job_applications_avg_expected_salary) }} VND
                        </p>
                        <p class="text-sm text-slate-500">
                            Other {{ Str::plural('applicant', $application->job->job_applications_count - 1) }}
                            {{ $application->job->job_applications_count - 1 }}
                        </p>
                    </div>
                    <div class="left">
                        <form action="{{ route('my-job-applications.destroy' , $application) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-sm rounded-none font-semibold bg-sky-500 text-white py-2 px-3 hover:bg-slate-300" style="transition: 0.5s">Cancel apply</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>You haven't applied for any jobs yet, <a class="underline text-sky-500" href="{{ route('jobs.index') }}">Go find some jobs ?</a></p>
        @endforelse
    </div>
</x-layout>