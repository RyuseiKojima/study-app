@include('profile.partials.frame', [
    'title' => 'フォローリスト',
    'table' => $users->getFollowsUsers($id),
])
