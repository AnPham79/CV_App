<div>
    <nav class="mb-4" >
        <ul class="flex space-x-4 text-slate-500">
            <li>
                <a href="{{ route('jobs.index') }}">Home</a>
            </li>

            <li>/</li>
            <li><a href="{{ route('jobs.index') }}">Job</a></li>
            <li>/</li>
            <li>{{ $job->title ?? '' }}</li>
        </ul>
    </nav>
</div>