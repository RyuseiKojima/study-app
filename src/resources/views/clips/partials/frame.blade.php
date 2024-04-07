{{-- $title, $tableを変数として各テーブルを表示するフレーム --}}

<h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
    {{ $title }}
</h2>
<table class="table table-striped">

    <thead>
        <tr>
            <th scope="col">投稿者</th>
            <th scope="col">タイトル</th>
            <th scope="col">サイト</th>
            <th scope="col">カテゴリ</th>
            <th scope="col">更新日時</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($table as $clip)
            <tr>
                <td>
                    @include('components.dark-link', [
                        'title' => $clip->user->name,
                        'route' => route('profile.show', $clip->user->id),
                    ])
                    @if ($auth_id == $clip->user->id)
                        {{-- ログイン中のユーザがフォローしているかどうかでボタンを変更 --}}
                    @elseif ($users->is_followed_by_auth_user($clip->user->id))
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
                <td><a href="{{ $clip->url }}" target="_blank" rel="noopener noreferrer">{{ $clip->title }}</a></td>
                <td>{{ $clip->site->name }}</td>
                <td>
                    @foreach ($clip->categories as $category)
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-secondary btn-sm"
                            style="--bs-btn-padding-y: .01rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">{{ $category->name }}</a>
                    @endforeach
                </td>
                <td>{{ $clip->updated_at }}</td>
                <td>
                    {{-- ログイン中のユーザがいいねしているかどうか --}}
                    @if ($clips->is_liked_by_auth_user($clip->id))
                        <form action="{{ route('likes.destroy', $clip->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-danger btn btn-sm"><i class="fa-solid fa-heart"></i>
                                {{ $clip->likes_count }}</button>
                        </form>
                    @else
                        <form action="{{ route('likes.store', $clip->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm"><i class="fa-solid fa-heart"></i>
                                {{ $clip->likes_count }}</button>
                        </form>
                    @endif
                </td>
                <td>
                    {{-- クリップがログインユーザのものかどうか --}}
                    @if ($clip->user_id == $auth_id)
                        <a href="{{ route('clips.edit', $clip->id) }}" class="btn btn-success btn-sm">更新</a>
                    @else
                        <a href="{{ route('clips.show', $clip->id) }}" class="btn btn-dark btn-sm">詳細</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
