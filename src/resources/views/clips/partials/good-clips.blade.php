<h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
    いいねした投稿
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
        @foreach ($goodClips as $clip)
            <tr>
                <td>{{ $clip->user->name }}</td>
                @include('clips.partials.main-tables')
            </tr>
        @endforeach
    </tbody>
</table>