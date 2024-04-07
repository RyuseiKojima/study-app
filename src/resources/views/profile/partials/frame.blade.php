{{-- $title, $tableを変数として各テーブルを表示するフレーム --}}

<h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
    {{ $title }}
</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ユーザ</th>
            <th scope="col">投稿数</th>
            <th scope="col">フォロー数</th>
            <th scope="col">フォロワー数</th>
            <th scope="col">いいね数</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($table as $user)
            <tr>
                {{-- ユーザ名前とフォローボタン --}}
                <td>
                    @include('components.dark-link', [
                        'title' => $user->name,
                        'route' => route('profile.show', $user->id),
                    ])
                    @if ($auth_id == $user->id)
                        {{-- ログイン中のユーザがフォローしているかどうかでボタンを変更 --}}
                    @elseif ($users->is_followed_by_auth_user($user->id))
                        <form action="{{ route('relationship.destroy', $user->id) }}" method="post"
                            class="inline-block ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-dark"><i
                                    class="fa-solid fa-user-check"></i></button>
                        </form>
                    @else
                        <form action="{{ route('relationship.store', $user->id) }}" method="post"
                            class="inline-block ml-1">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-secondary"><i
                                    class="fa-solid fa-user-plus"></i></button>
                        </form>
                    @endif
                </td>
                <td>
                    @include('components.dark-link', [
                        'title' => $users->getUser($user->id)->clips_count,
                        'route' => route('profile.show', $user->id),
                    ])
                </td>
                <td>
                    @include('components.dark-link', [
                        'title' => $users->getUser($user->id)->follows_count,
                        'route' => route('profile.show.follows', $user->id),
                    ])
                </td>
                <td>
                    @include('components.dark-link', [
                        'title' => $users->getUser($user->id)->followed_count,
                        'route' => route('profile.show.followed', $user->id),
                    ])
                </td>
                <td>
                    @include('components.dark-link', [
                        'title' => $users->getUser($user->id)->likes_count,
                        'route' => route('profile.show.good', $user->id),
                    ])
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
