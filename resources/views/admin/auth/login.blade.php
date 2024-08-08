<x-guest-layout>
    <!-- Session Status -->
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

    <form method="POST" action="{{ route('admin.login_post') }}">
        @csrf

        <!-- first_name -->
        <div>
            <x-input-label for="first_name" :value="'Ваше имя'" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>
        <!-- last_name -->
        <div>
            <x-input-label for="last_name" :value="'Ваше фамилия'" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="'Пароль'" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-3">
                Вход
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
