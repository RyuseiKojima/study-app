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
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">タイトル</th>
                                <th scope="col">サイト</th>
                                <th scope="col">カテゴリ</th>
                                <th>作成日時</th>
                                <th>更新日時</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allClips as $clip)
                                <tr>
                                    <td><a href="{{ $clip->url }}" target="_blank"
                                            rel="noopener noreferrer">{{ $clip->title }}</a></td>
                                    <td>{{ $clip->site }}</td>
                                    <td>{{ $clip->category }}</td>
                                    <td>{{ $clip->created_at }}</td>
                                    <td>{{ $clip->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('clips.edit', $clip->id) }}"
                                            class="btn btn-success btn-sm">更新</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('clips.destroy', $clip->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
