@extends('layouts.app')

@section('content')
    <div class="font-[sans-serif] bg-white md:h-screen">
        <div class="grid md:grid-cols-2 items-center gap-8 h-full">
            <div class="max-md:order-1 p-4">
                <img src="https://readymadeui.com/signin-image.webp" class="lg:max-w-[85%] w-full h-full object-contain block mx-auto" alt="login-image" />
            </div>

            <div class="flex items-center md:p-8 p-6 bg-[#0C172C] h-full lg:w-11/12 lg:ml-auto">
                <form method="POST" action="{{ route('register') }}" class="max-w-lg w-full mx-auto">
                    @csrf

                    <div class="mb-12">
                        <h3 class="text-3xl font-bold text-yellow-400">Create an account</h3>
                    </div>

                    <div>
                        <label class="text-white text-xs block mb-2">Full Name</label>
                        <div class="relative flex items-center">
                            <input name="full_name" type="text" required class="w-full bg-transparent text-sm text-white border-b border-gray-300 focus:border-yellow-400 px-2 py-3 outline-none" placeholder="Enter name" />
                        </div>
                    </div>

                    <div class="mt-8">
                        <label class="text-white text-xs block mb-2">Email</label>
                        <div class="relative flex items-center">
                            <input name="email" type="email" required class="w-full bg-transparent text-sm text-white border-b border-gray-300 focus:border-yellow-400 px-2 py-3 outline-none" placeholder="Enter email" />
                        </div>
                    </div>

                    <div class="mt-8">
                        <label class="text-white text-xs block mb-2">Password</label>
                        <div class="relative flex items-center">
                            <input name="password" type="password" required class="w-full bg-transparent text-sm text-white border-b border-gray-300 focus:border-yellow-400 px-2 py-3 outline-none" placeholder="Enter password" />
                        </div>
                    </div>

                    <div class="mt-8">
                        <label class="text-white text-xs block mb-2">Confirm Password</label>
                        <div class="relative flex items-center">
                            <input name="password_confirmation" type="password" required class="w-full bg-transparent text-sm text-white border-b border-gray-300 focus:border-yellow-400 px-2 py-3 outline-none" placeholder="Confirm password" />
                        </div>
                    </div>

                    <div class="flex items-center mt-8">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 rounded" />
                        <label for="remember-me" class="text-white ml-3 block text-sm">
                            I accept the <a href="javascript:void(0);" class="text-yellow-500 font-semibold hover:underline ml-1">Terms and Conditions</a>
                        </label>
                    </div>

                    <div class="mt-12">
                        <button type="submit" class="w-max shadow-xl py-3 px-6 text-sm text-gray-800 font-semibold rounded-md bg-transparent bg-yellow-400 hover:bg-yellow-500 focus:outline-none">
                            Register
                        </button>
                        <p class="text-sm text-white mt-8">Already have an account? <a href="" class="text-yellow-400 font-semibold hover:underline ml-1">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
