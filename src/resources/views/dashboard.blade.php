<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div>
                    <button class="btn btn-primary my-1"
                        onclick="location.href='{{ route('clips.create') }}'">新規作成</button>
                </div>
                <!-- ナビアイテム定義部分 -->
                <ul class="nav nav-tabs my-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <!-- ページを開いた時に表示されている部分に関してはclass="active"とaria-selected="true"が必要 -->
                        <a href="#all" class="nav-link active text-secondary" id="all-tab" data-bs-toggle="tab"
                            role="tab" aria-controls="all" aria-selected="true">
                            すべての投稿 <!-- ここに書いたものがナビアイテムとして表示される -->
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#your" class="nav-link text-secondary" id="your-tab" data-bs-toggle="tab"
                            role="tab" aria-controls="your" aria-selected="false">
                            あなたの投稿
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#follows" class="nav-link text-secondary" id="follows-tab" data-bs-toggle="tab"
                            role="tab" aria-controls="follows" aria-selected="false">
                            フォロワーの投稿
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#good" class="nav-link text-secondary" id="good-tab" data-bs-toggle="tab"
                            role="tab" aria-controls="good" aria-selected="false">
                            いいねした投稿
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <!-- タブパネルの中身を書く -->
                        @include('clips.partials.all-clips')
                    </div>
                    <div class="tab-pane fade" id="your" role="tabpanel" aria-labelledby="your-tab">
                        @include('clips.partials.your-clips')
                    </div>
                    <div class="tab-pane fade" id="follows" role="tabpanel" aria-labelledby="follows-tab">
                        @include('clips.partials.follows-clips')
                    </div>
                    <div class="tab-pane fade" id="good" role="tabpanel" aria-labelledby="good-tab">
                        @include('clips.partials.good-clips')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
