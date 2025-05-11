<x-guest-layout>
    <div class="flex items-center justify-center px-4 py-4">
        <div class="w-full max-w-lg dark:bg-gray-900 rounded-2xl shadow-2xl p-8">
            <h2 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white mb-6">Welcome Back</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <input id="email"
                        class="block w-full mt-1 px-4 py-2 text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <input id="password"
                        class="block w-full mt-1 px-4 py-2 text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400">
                        <input id="remember_me"
                            type="checkbox"
                            class="rounded border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-purple-600 focus:ring-purple-500"
                            name="remember">
                        <span class="ml-2">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-purple-600 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-lg font-semibold rounded-lg shadow-md transition duration-300 transform hover:-translate-y-1 hover:scale-105">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>

            <div class="mt-4 text-center">
                <span class="text-gray-600 dark:text-gray-400">New user?</span>
                <a href="{{ route('register') }}" class="text-purple-600 hover:underline font-semibold ml-1">Sign up</a>
            </div>

        </div>
    </div>
</x-guest-layout>
