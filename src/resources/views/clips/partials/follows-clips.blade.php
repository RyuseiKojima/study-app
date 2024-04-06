@include('clips.partials.frame', [
    'title' => 'フォロワーの投稿',
    'table' => $clips->getFollowerClips($id),
])
