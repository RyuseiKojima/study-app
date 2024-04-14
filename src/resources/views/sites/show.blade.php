<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @include('components.dark-link', [
                    'title' => 'ホーム',
                    'route' => route('dashboard'),
                ])
                @include('clips.partials.site-clips')
            </div>
        </div>
    </div>
</x-app-layout>
