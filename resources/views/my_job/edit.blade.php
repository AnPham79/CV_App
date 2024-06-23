<x-layout>
    <x-card>
        <form action="{{ route('my-jobs.update', $job) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="title" :required='true'>Job title</label>
                    <input class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 
                     text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" 
                    id="title" type="text" value="{{ old('title', $job->title) }}" placeholder="Enter your job title" name="title">
                    @error('title')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="location" :required='true'>Location</label>
                    <input class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 
                     text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('location') border-red-500 @enderror" 
                    id="location" type="text" value="{{ old('location', $job->location) }}" placeholder="Enter your location" name="location">
                    @error('location')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-span-2">
                <label for="salary" :required='true'>Salary</label>
                <input class="my-2 shadow appearance-none border rounded w-full py-2 px-3 
                 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('salary') border-red-500 @enderror" 
                id="salary" type="number" value="{{ old('salary', $job->salary) }}" placeholder="Enter your salary" name="salary">
                @error('salary')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-2">
                <label for="description" :required='true'>Description</label>
                <textarea id="description" name="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 
                 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" placeholder="Enter your description">{{ old('description', $job->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 grid grid-cols-2 gap-4">
                <!-- Experience Section -->
                <div>
                    <label for="experience" class="block text-gray-700 text-sm font-bold mb-2">Experience</label>
                    @php
                        $experienceOptions = array_combine(
                            array_map('ucfirst', \App\Models\Job::$experience),
                            \App\Models\Job::$experience
                        );
                    @endphp
                    @foreach($experienceOptions as $label => $value)
                        <div class="flex items-center mb-2">
                            <input id="experience_{{ $value }}" type="radio" name="experience" value="{{ $value }}" class="form-radio h-4 w-4 text-blue-600 transition duration-150 ease-in-out" {{ old('experience', $job->experience) === $value ? 'checked' : '' }}>
                            <label for="experience_{{ $value }}" class="ml-2 text-gray-700">{{ $label }}</label>
                        </div>
                    @endforeach 
                    @error('experience')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Languages Section -->
                <div>
                    <label for="languages" class="block text-gray-700 text-sm font-bold mb-2">Languages</label>
                    @php
                        $languages = \App\Models\Job::$languages;
                    @endphp
                    @foreach($languages as $language)
                        <div class="flex items-center mb-2">
                            <input id="language_{{ $language }}" type="radio" name="languages" value="{{ $language }}" class="form-radio h-4 w-4 text-blue-600 transition duration-150 ease-in-out" {{ old('languages', $job->languages) === $language ? 'checked' : '' }}>
                            <label for="language_{{ $language }}" class="ml-2 text-gray-700">{{ $language }}</label>
                        </div>
                    @endforeach
                    @error('languages')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="bg-sky-500 w-full text-white font-small py-2">Edit</button>
        </form>
    </x-card>
</x-layout>
