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
        </tr>
    </thead>
    <tbody>
        @foreach ($allClips as $clip)
            <tr>
                <td>
                    {{ $clip->user->name }}
                    @if (Auth::user()->id == $clip->user->id)
                        {{-- ログイン中のユーザがフォローしているかどうかでボタンを変更 --}}
                    @elseif (in_array($clip->user->id, $getYourFollows))
                        <form action="{{ route('relationship.destroy', $clip->user->id) }}" method="post"
                            class="inline-block ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-dark"><i
                                    class="fa-solid fa-user-check"></i></button>
                        </form>
                    @else
                        <form action="{{ route('relationship.store', $clip->user->id) }}" method="post"
                            class="inline-block ml-1">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-secondary"><i
                                    class="fa-solid fa-user-plus"></i></button>
                        </form>
                    @endif
                </td>
                @include('clips.partials.main-tables')
            </tr>
        @endforeach
    </tbody>
</table>
