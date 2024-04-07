@include('clips.partials.frame', [
    'title' => "{$categories->getCategory($id)->name}の投稿",
    'table' => $clips->getCategoryClips($id),
])
