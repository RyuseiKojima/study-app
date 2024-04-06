<tr>
    {{-- ユーザ名前とフォローボタン --}}
    <td>
        <a class="link-offset-2 link-underline link-underline-opacity-0 text-dark"
            href="{{ route('profile.show', $user->id) }}">{{ $user->name }}</a>

        @if ($auth_id == $user->id)
            {{-- ログイン中のユーザがフォローしているかどうかでボタンを変更 --}}
        @elseif ($users->is_followed_by_auth_user($user->id))
            <form action="{{ route('relationship.destroy', $user->id) }}" method="post" class="inline-block ml-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-dark"><i class="fa-solid fa-user-check"></i></button>
            </form>
        @else
            <form action="{{ route('relationship.store', $user->id) }}" method="post" class="inline-block ml-1">
                @csrf
                <button type="submit" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-plus"></i></button>
            </form>
        @endif
    </td>
    <td>
        <a href="{{ route('profile.show', $user->id) }}">{{ $users->getUser($user->id)->clips_count }}</a>
    </td>
    <td>
        <a href="{{ route('profile.show.follows', $user->id) }}">{{ $users->getUser($user->id)->follows_count }}</a>
    </td>
    <td>
        <a href="{{ route('profile.show.followed', $user->id) }}">{{ $users->getUser($user->id)->followed_count }}</a>
    </td>
    <td>
        <a href="{{ route('profile.show.good', $user->id) }}">{{ $users->getUser($user->id)->likes_count }}</a>
    </td>
</tr>
