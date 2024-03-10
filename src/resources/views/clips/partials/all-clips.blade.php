<h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
    すべての投稿
</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">投稿者</th>
            <th scope="col">タイトル</th>
            <th scope="col">サイト</th>
            <th scope="col">カテゴリ</th>
            <th>更新日時</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allClips as $clip)
            <tr>
                <td>{{ $clip->user->name }}</td>
                <td><a href="{{ $clip->url }}" target="_blank" rel="noopener noreferrer">{{ $clip->title }}</a></td>
                <td>{{ $clip->site->name }}</td>
                <td>
                    @foreach ($clip->categories as $category)
                        <div>{{ $category->name }}</div>
                    @endforeach
                </td>
                <td>{{ $clip->updated_at }}</td>
                <td>

                    {{-- ログイン中のユーザがいいねしているかどうかでボタンを変更 --}}
                    @if (in_array($clip->id, $getYourLikes))
                        <form action="{{ route('likes.destroy', $clip->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">いいね</button>
                        </form>
                    @else
                        <form action="{{ route('likes.store', $clip->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm">いいね</button>
                        </form>
                    @endif
                    {{-- <button onclick="like({{ $clip->id }})">いいね</button> --}}
                </td>
                @if ($clip->user_id == Auth::user()->id)
                    <td>
                        <a href="{{ route('clips.edit', $clip->id) }}" class="btn btn-success btn-sm">更新</a>
                    </td>
                    <td>
                        <form action="{{ route('clips.destroy', $clip->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">削除</button>
                        </form>
                    </td>
                @else
                    <td></td>
                    <td></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
