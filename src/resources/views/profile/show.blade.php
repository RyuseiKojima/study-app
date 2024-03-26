<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="h3 text-center">{{ $getUser->name }}</div>
                <div class="text-center">
                    @if ($id == Auth::user()->id)
                        <a href="{{ route('profile.edit') }}" class="btn btn-secondary btn-sm">プロフィール更新</a>
                    @endif
                    @php
                        // dd($getUser);
                    @endphp
                </div>

                <table class="mt-3 table table-borderless w-25 m-auto text-center">
                    <thead>
                        <tr>
                            <th scope="col-1">投稿</th>
                            <th scope="col-1">フォロー</th>
                            <th scope="col-1">フォロワー</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{{ route('profile.show', $getUser->id) }}">{{ $getUser->clips_count }}</a>
                            </td>
                            <td><a href="">{{ $getUser->follows_count }}</a></td>
                            <td><a href="">{{ $getUser->followed_count }}</a></td>
                        </tr>
                    </tbody>
                </table>

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <!-- ナビアイテム定義部分 -->
                <ul class="nav nav-tabs my-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#your" class="nav-link active text-secondary" id="your-tab" data-bs-toggle="tab"
                            role="tab" aria-controls="your" aria-selected="false">
                            ユーザの投稿
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
                    <div class="tab-pane fade show active" id="your" role="tabpanel" aria-labelledby="your-tab">
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
