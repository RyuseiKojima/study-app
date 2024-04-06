@include('profile.partials.frame', [
    'title' => 'フォロワーリスト',
    'table' => $users->getFollowedUsers($id),
])
