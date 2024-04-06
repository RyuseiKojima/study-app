<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @include('profile.partials.show-profile-base')
                @include('profile.partials.follows-users')
            </div>
        </div>
    </div>
</x-app-layout>
