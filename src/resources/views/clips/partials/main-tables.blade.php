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
