<x-card class="mb-4">
    <div class="flex justify-between">
        <h2 class="text-lg font-medium">{{ $job->title }}</h2>
        <div class="text-slate-500 text-sm">{{ number_format($job->salary) }} VND</div>
    </div>

    <div class="my-2">
        <p class="text-sm"><b>Short description:</b></p>
        <p class="text-sm text-slate-500">{!! nl2br(e($job->short_description)) !!}</p>
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

    {{ $slot }}
</x-card>