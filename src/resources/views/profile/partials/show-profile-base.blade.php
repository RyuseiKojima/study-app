@include('components.dark-link', [
    'title' => 'ホーム',
    'route' => route('dashboard'),
])
<br>
@if ($id != $auth_id)
    @include('components.dark-link', [
        'title' => 'マイプロフィール',
        'route' => route('profile.show.good', $auth_id),
    ])
@endif
<div class="h3 text-center">{{ $users->getUser($id)->name }}</div>
<div class="text-center">
    @if ($id == $auth_id)
        <a href="{{ route('profile.edit') }}" class="btn btn-secondary btn-sm">プロフィール更新</a>
    @elseif ($users->is_followed_by_auth_user($id))
        <form action="{{ route('relationship.destroy', $id) }}" method="post" class="inline-block ml-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-dark"><i class="fa-solid fa-user-check"></i></button>
        </form>
    @else
        <form action="{{ route('relationship.store', $id) }}" method="post" class="inline-block ml-1">
            @csrf
            <button type="submit" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-plus"></i></button>
        </form>
    @endif
</div>
<table class="my-3 table table-borderless w-50 m-auto text-center">
    <thead>
        <tr>
            <th>投稿</th>
            <th>フォロー</th>
            <th>フォロワー</th>
            <th>いいね</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                @include('components.dark-link', [
                    'title' => $users->getUser($id)->clips_count,
                    'route' => route('profile.show', $id),
                ])
            </td>
            <td>
                @include('components.dark-link', [
                    'title' => $users->getUser($id)->follows_count,
                    'route' => route('profile.show.follows', $id),
                ])
            </td>
            <td>
                @include('components.dark-link', [
                    'title' => $users->getUser($id)->followed_count,
                    'route' => route('profile.show.followed', $id),
                ])
            </td>
            <td>
                @include('components.dark-link', [
                    'title' => $users->getUser($id)->likes_count,
                    'route' => route('profile.show.good', $id),
                ])
            </td>
        </tr>
    </tbody>
</table>

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
