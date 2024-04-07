@include('clips.partials.frame', [
    'title' => 'ユーザの投稿',
    'table' => $clips->getYourClips($id),
])
