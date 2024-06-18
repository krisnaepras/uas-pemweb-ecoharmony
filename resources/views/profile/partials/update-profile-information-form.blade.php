
<section class="space-y-6 font-poppins bg-green-800 p-6 rounded-lg shadow-lg">
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-green-700" />
            <x-text-input id="name" name="name" type="text" class=" text-green-500 mt-1 block w-full border-green-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-lg" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="username" :value="__('Username')" class="text-green-700" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-lg" :value="old('username', $user->username)" required autocomplete="username" />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-green-700" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-lg" :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-green-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-green-800 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="no_hp" :value="__('No HP')" class="text-green-700" />
            <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-lg" :value="old('no_hp', $user->no_hp)" autocomplete="no_hp" />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('no_hp')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-800">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>