<x-layout>
    <x-card>
        @if(session()->has('error'))
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="company_name" required="true">Company Name</label>
                <input class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 
                text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id="username" type="text" placeholder="Enter your company name" name="company_name">
            </div>
            <button type="submit" class="bg-sky-500 w-full text-white font-small py-2">Submit</button>
        </form>
    </x-card>
</x-layout>