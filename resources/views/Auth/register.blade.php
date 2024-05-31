<x-layout>
    <div class="px-24">
        <x-card class="py-8 px-16">
            <h1 class="my-8 text-center text-4xl font-medium text-slate-600">
                Register
            </h1>
    
            <form action="{{ route('auth.process-register') }}" method="POST" class="rounded-md">
                @csrf

                <div class="mb-6">
                    <label for="">Your name</label>
                    <div>
                        <input type="text" placeholder="Enter your name"
                        name="name" value="{{ old('name') }}"
                        class="w-full mt-2 rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2">
                    </div>
                </div>
    
                <div class="mb-6">
                    <label for="">Email</label>
                    <div>
                        <input type="text" placeholder="Enter your email address"
                        name="email" value="{{ old('email') }}"
                        class="w-full mt-2 rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2">
                    </div>
                </div>
    
                <div class="mb-6">
                    <label for="">Password</label>
                    <div>
                        <input type="text" placeholder="Enter your password"
                        name="password" value="{{ old('password') }}"
                        class="w-full mt-2 rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2">
                    </div>
                </div>

                <button class="w-full bg-sky-500 py-2 text-white hover:bg-slate-600" style="transition: 0.5s">Register</button>
            </form>

            <p class="text-center py-3 font-semibold text-sm">Or Register with</p>

            <div class="login-with-social grid grid-rows-1 grid-flow-col gap-2">
                <button class="py-2 border border-slate-500 hover:bg-black" style="transition: 0.5s"><a href=""><i class="fa-brands fa-github"></i></a></button>
                <button class="py-2 border border-red-500 text-red-600 hover:bg-red-500 hover:text-white" style="transition: 0.5s"><a href=""><i class="fa-brands fa-google"></i></a></button>
            </div>

            <p class="text-md text-center mt-5">Do you already have an account ? <a href="{{ route('auth.login') }}" class="text-blue-500 hover:underline">login now</a></p>
        </x-card>
    </div>
</x-layout>