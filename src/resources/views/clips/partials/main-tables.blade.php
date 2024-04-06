<td><a href="{{ $clip->url }}" target="_blank" rel="noopener noreferrer">{{ $clip->title }}</a></td>
<td>{{ $clip->site->name }}</td>
<td>
    @foreach ($clip->categories as $category)
        <div>{{ $category->name }}</div>
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
