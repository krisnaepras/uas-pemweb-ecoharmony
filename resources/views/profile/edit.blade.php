
<x-app-layout>

    <div class="py-12 bg-white min-h-screen font-poppins">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="max-w-xl mx-auto">
                    @include('profile.partials.update-password-form')
                </div>

                <div class="max-w-xl mx-auto">
                    @include('profile.partials.delete-user-form')
                </div>
        </div>
    </div>
</x-app-layout>