<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('記事一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <button type="submit" class="btn btn-primary my-1">新規登録</button>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table border="1">
                        <tr>
                            <th>映画タイトル</th>
                            <th width="150px">画像URL</th>
                            <th>公開年</th>
                            <th>上映中かどうか</th>
                            <th>概要</th>
                        </tr>
                        @foreach ($clips as $movie)
                            <tr>
                                <td><a href="clips/{{ $movie->id }}">{{ $movie->title }}</a></td>
                                <td><img style="max-width: 150px;" src="{{ $movie->image_url }}" alt=""></td>
                                <td>{{ $movie->published_year }}</td>
                                <td>
                                    @if ($movie->is_showing)
                                        上映中
                                    @else
                                        上映予定
                                    @endif
                                </td>
                                <td>{{ $movie->description }}</td>
                                </td>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
