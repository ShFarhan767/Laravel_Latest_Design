<x-guest-layout>
    <div class="flex items-center justify-center px-4 py-4">
        <div class="w-full max-w-lg dark:bg-gray-900 rounded-2xl p-8 border-2 border-purple-300">
            <h2 class="text-center text-2xl font-bold text-gray-900 dark:text-white mb-4">Forgot Your Password?</h2>

            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 text-center">
                {{ __('No problem. Just enter your email and we’ll send you a password reset link.') }}
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                        autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-lg font-semibold rounded-lg shadow-md transition duration-300 transform hover:-translate-y-1 hover:scale-105">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
