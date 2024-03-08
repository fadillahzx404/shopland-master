<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class=" py-5">
            <p class="font-bold text-xl">Hello Customer!</p>
            <p class="text-sm text-gray-500">Log in if you have a account or register.</p>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                class="block mt-1 w-full input focus:outline-offset-0 focus:border-none input-accent" type="email"
                name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"
                class="block mt-1 w-full input focus:outline-offset-0 focus:border-none input-accent" type="password"
                name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <div class="grid items-center justify-end mt-4">
            <div class="flex flex-row gap-2 my-3">
                <a class="p-2 btn btn-active btn-sm btn-ghost hover:bg-green-500 transition durat hover:scale-90"
                    href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
                <x-primary-button>
                    {{ __('Log in') }}
                </x-primary-button>

            </div>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800 text-end"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

        </div>
    </form>
</x-guest-layout>
