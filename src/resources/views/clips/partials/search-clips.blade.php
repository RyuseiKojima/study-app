@include('clips.partials.frame', [
    'title' => "「{$keyword}」の検索結果",
    'table' => $clips->getSearchClips($keyword),
])
