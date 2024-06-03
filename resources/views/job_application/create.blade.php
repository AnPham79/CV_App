<x-layout>
    <nav class="mb-4" >
        <ul class="flex space-x-4 text-slate-500">
            <li>
                <a href="{{ route('jobs.index') }}">Home</a>
            </li>

            <li>/</li>
            <li><a href="{{ route('jobs.index') }}">Job</a></li>
            <li>/</li>
            <li>{{ $job->title ?? '' }}</li>
            <li>/</li>
            <li>Apply</li>
        </ul>
    </nav>

    <x-job-card :$job>

    </x-job-card>

    <x-card>
        <h2 class="mb-4 text-lg font-small">
            Your job application
        </h2>

        <form action="{{ route('job.application.store', $job) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="expected_salary"
                class="mb-3 block text-sm font-medium text-slate-900">
                    Expected salary
                </label>

                <div class="mt-2">
                    <x-text-input type="number" name="expected_salary" />
                </div>

                <button style="transition:0.5s" class="w-full rounded-0 text-white font-semibold py-2 mt-4 hover:bg-slate-500 bg-sky-500">Apply now</button>
            </div>
        </form>
    </x-card>
</x-layout>