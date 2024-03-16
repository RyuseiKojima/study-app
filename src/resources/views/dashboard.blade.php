<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイページ') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button class="btn btn-primary my-1"
                        onclick="location.href='{{ route('clips.index') }}'">記事一覧</button>
                    <div>
                        @include('clips.partials.your-clips')
                    </div>
                    <div>
                        @include('clips.partials.all-clips')
                    </div>
                    <div>
                        @include('clips.partials.good-clips')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
