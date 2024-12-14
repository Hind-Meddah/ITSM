<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __(' définez un nouveau mot de passe pour votre connexion.') }}
    </div>

    {{-- <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    <form method="POST" action="{{ route('pwd.change') }}">
        @csrf

        <!-- Current Password -->
        <div class="mt-4">
            <x-input-label for="currentpassword" :value="__('Mot de passe actuel')" />

            <x-text-input id="currentpassword" class="block mt-1 w-full" type="password" name="currentpassword" required />

            <x-input-error :messages="$errors->get('currentpassword')" class="mt-2" />
        </div>
        <!-- New Password -->
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Changer') }}
            </x-primary-button>

        </div>

    </form>
</x-guest-layout>
