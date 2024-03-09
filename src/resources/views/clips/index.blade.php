<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('記事一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div>
                        <button class="btn btn-primary my-1"
                            onclick="location.href='{{ route('clips.create') }}'">新規作成</button>
                    </div>
                    <div>
                        @include('clips.partials.your-clips')
                    </div>
                    <div>
                        @include('clips.partials.all-clips')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
