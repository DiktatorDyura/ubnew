<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.studentNumber') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="studentNumber" :value="__('studentNumber')" />
            <x-text-input id="studentNumber" class="block mt-1 w-full" name="studentNumber" :value="old('studentNumber')" required autofocus />
            <x-input-error :messages="$errors->get('studentNumber')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
