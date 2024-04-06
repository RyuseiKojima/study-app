@include('clips.partials.frame', [
    'title' => 'いいねした投稿',
    'table' => $clips->getGoodClips($id),
])
