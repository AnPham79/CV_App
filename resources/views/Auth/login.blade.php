<x-layout>
    <div class="px-24">
        <x-card class="py-8 px-16">
            <h1 class="my-8 text-center text-4xl font-medium text-slate-600">
                Login
            </h1>
    
            <form action="{{ route('auth.process-login') }}" method="POST" class="rounded-md">
                @csrf
    
                <div class="mb-8">
                    <label for="">Email</label>
                    <div>
                        <input type="text" placeholder="Enter your email address"
                        name="email" value="{{ old('email') }}"
                        class="w-full mt-2 rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2">
                    </div>
                </div>
    
                <div class="mb-8">
                    <label for="">Password</label>
                    <div>
                        <input type="text" placeholder="Enter your password"
                        name="password" value="{{ old('password') }}"
                        class="w-full mt-2 rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2">
                    </div>
                </div>
    
                <div class="mb-8 flex justify-between text-sm font-medium space-x-2">
                    <div class="">
                        <input type="checkbox" name="remember" class="rounded-sm border border-slate-400">
                        <label for="">Remember me</label>
                    </div>
                    <a href="#" class="text-indigo-600 hover:underline">
                        Forget password?
                    </a>
                </div>

                <button class="w-full bg-sky-500 py-2 text-white hover:bg-slate-600" style="transition: 0.5s">Login</button>
            </form>

            <p class="text-center py-3 font-semibold text-sm">Or login with</p>

            <div class="login-with-social grid grid-rows-1 grid-flow-col gap-2">
                <button class="py-2 border border-slate-500"><a href="">Git</a></button>
                <button class="py-2 border border-red-500"><a href="">Google</a></button>
            </div>
        </x-card>
    </div>
</x-layout>