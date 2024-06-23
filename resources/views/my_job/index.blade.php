<x-layout>
    <x-card>
      All Jobs!
    </x-card>
  
    <div class="mb-8 text-right">
      <a href="{{ route('my-jobs.create') }}">
        <button class="bg-sky-500 text-white py-2 px-3 text-sm">Add job</button>
      </a>
    </div>
  
    @forelse ($jobs as $job)
      <x-job-card :$job>
        <div class="text-xs text-slate-500">
          @forelse ($job->jobApplications as $application)
            <div class="mb-4 flex items-center justify-between">
              <div>
                <div>{{ $application->user->name }}</div>
                <div>
                  Applied {{ $application->created_at->diffForHumans() }}
                </div>
                <div>
                  Download CV
                </div>
              </div>
  
              <div>${{ number_format($application->expected_salary) }}</div>
            </div>

            <a href="" class="font-bold text-sm">Edit</a>
          @empty
            <div>No applications yet</div>
          @endforelse
        </div>
      </x-job-card>
    @empty
      <div class="rounded-md border border-dashed border-slate-300 p-8">
        <div class="text-center font-medium">
          No jobs yet
        </div>
        <div class="text-center">
          Post your first job <a class="text-indigo-500 hover:underline"
            href="{{ route('my-jobs.create') }}">here!</a>
        </div>
      </div>
    @endforelse
  </x-layout>