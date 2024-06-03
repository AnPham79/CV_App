<x-layout>
    <x-breadcrumbs :$job class="mb-4">

    </x-breadcrumbs>

    <x-card class="mb-4">
        <div class="flex justify-between">
            <h2 class="text-lg font-medium">{{ $job->title }}</h2>
            <div class="text-slate-500 text-sm">{{ number_format($job->salary) }} VND</div>
        </div>

        <div class="mb-4 mt-4 flex justify-between text-sm text-slate-500">
            <div class="">
                <div class="font-sm"><b>Company name: </b>{{ $job->employer->company_name }}</div>
                <div class="font-sm"><b>location: </b>{{ $job->location }}</div>
            </div>
            <div class="flex space-x-1 text-xs">
                <x-tag>
                    <b>Ex: </b>{{ $job->experience }}
                </x-tag>
                <x-tag>
                    <b>Language: </b>{{ $job->languages }}
                </x-tag>
            </div>
        </div>

        <p class="text-sm text-slate-500 my-2">{!! nl2br(e($job->description)) !!}</p>

        @can('apply', $job)
            <a href="{{ route('job.application.create', $job) }}" class="underline font-semibold text-sky-500">Apply now</a >
        @else
            <p class="text-center font-sm text-slate-500 mt-5">Sorry, You have already applied for this job</p>
        @endcan

    </x-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More jobs in {{ $job->employer->company_name }} company
        </h2>


        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $otherJob)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{ route('jobs.show', $otherJob) }}">
                                {{ $otherJob->title }}
                            </a>
                        </div>
                        <div class="text-xs">
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-xs">
                        {{ number_format($otherJob->salary) }} VND
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
