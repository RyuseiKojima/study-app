@include('clips.partials.frame', [
    'title' => 'すべての投稿',
    'table' => $clips->getAllClips(),
])
