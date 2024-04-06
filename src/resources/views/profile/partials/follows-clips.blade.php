<h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
    フォローリスト
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
        @foreach ($users->getFollowsUsers($id) as $user)
            @include('profile.partials.user-tables')
        @endforeach
    </tbody>
</table>
