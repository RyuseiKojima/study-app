<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('記事一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <button class="btn btn-primary my-1"
                        onclick="location.href='{{ route('clips.create') }}'">新規作成</button>
                </div>
                <div class="p-6 text-gray-900">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">タイトル</th>
                                <th scope="col">サイト</th>
                                <th scope="col">カテゴリ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clips as $clip)
                                <tr>
                                    <th scope="row">{{ $clip->id }}</th>

                                    <td><a href="{{ $clip->url }}" target="_blank"
                                            rel="noopener noreferrer">{{ $clip->title }}</a></td>
                                    <td>{{ $clip->site }}</td>
                                    <td>{{ $clip->category }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
