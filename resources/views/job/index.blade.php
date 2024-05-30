<div>
    <x-layout>
        <x-breadcrumbs class="mb-4" />

        <x-card class="mb-4 text-sm">
            <form action="{{ route('jobs.index') }}" method="GET">
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="">
                        <div class="mb-1 font-semibold">Search</div>
                        <x-text-input 
                        name="search" value="{{ request('search') }}" 
                        placeholder="Enter the job or Company name you want" />
                    </div>
                    <div class="">
                        <div class="mb-1 font-semibold">Salary</div>
                        
                        <div class="flex space-x-2">
                            <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" />
    
                            <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" />
                        </div>
                    </div>
                </div>

                <div class="flex justify-between py-4">
                    <div class="mb-1 font-semibold">Experience</div>
                    
                    <label for="" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="" 
                        @checked(!request('experience'))>
                        <span class="ml-2">All</span>
                    </label>

                    <label for="" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="fresher" 
                        @checked(request('experience') == 'fresher')>
                        <span class="ml-2">Fresher</span>
                    </label>

                    <label for="" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="intermediare" 
                        @checked(request('experience') == 'intermediare')>
                        <span class="ml-2">Intermediate</span>
                    </label>

                    <label for="" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="senior" 
                        @checked(request('experience') == 'senior')>
                        <span class="ml-2">Senior</span>
                    </label>
                </div>

                <button type="submit" class="w-full rounded-none bg-sky-500 text-white py-2 px-5 mt-2 font-semibold">Filter</button>
            </form>
        </x-card>

        @foreach ($jobs as $job)
            <x-job-card class="mb-4" :$job>
                <div class="">
                    <a href="{{ route('jobs.show', $job) }}" class="text-blue-400 text-sm">
                        See detail
                    </a>
                </div>
            </x-job-card>
        @endforeach
        
    </x-layout>
    
</div>