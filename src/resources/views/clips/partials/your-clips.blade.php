@include('clips.partials.frame', [
    'title' => 'あなたの投稿',
    'table' => $clips->getYourClips($id),
])
