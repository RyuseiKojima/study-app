@include('clips.partials.frame', [
    'title' => "{$sites->getSite($id)->name}の投稿",
    'table' => $clips->getSiteClips($id),
])
