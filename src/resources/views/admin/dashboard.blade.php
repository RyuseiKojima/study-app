<x-admin-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <!-- ナビアイテム定義部分 -->
                <ul class="nav nav-tabs my-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <!-- ページを開いた時に表示されている部分に関してはclass="active"とaria-selected="true"が必要 -->
                        <a href="#clips" class="nav-link active text-secondary" id="clips-tab" data-bs-toggle="tab"
                            role="tab" aria-controls="clips" aria-selected="true">
                            投稿リスト <!-- ここに書いたものがナビアイテムとして表示される -->
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#users" class="nav-link text-secondary" id="users-tab" data-bs-toggle="tab"
                            role="tab" aria-controls="users" aria-selected="false">
                            ユーザリスト
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#sites" class="nav-link text-secondary" id="sites-tab" data-bs-toggle="tab"
                            role="tab" aria-controls="sites" aria-selected="false">
                            サイトリスト
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#categories" class="nav-link text-secondary" id="categories-tab" data-bs-toggle="tab"
                            role="tab" aria-controls="categories" aria-selected="false">
                            カテゴリリスト
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#classifications" class="nav-link text-secondary" id="classifications-tab"
                            data-bs-toggle="tab" role="tab" aria-controls="classifications" aria-selected="false">
                            区分リスト
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="clips" role="tabpanel" aria-labelledby="clips-tab">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
                            投稿リスト
                        </h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">投稿者</th>
                                    <th scope="col">タイトル</th>
                                    <th scope="col">サイト</th>
                                    <th scope="col">カテゴリ</th>
                                    <th scope="col">いいね数</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clips->getAllClips() as $clip)
                                    <tr>
                                        <td>
                                            {{ $clip->id }}
                                        </td>
                                        <td>
                                            {{ $clip->user->name }}
                                        </td>
                                        <td><a href="{{ $clip->url }}" target="_blank"
                                                rel="noopener noreferrer">{{ $clip->title }}</a></td>
                                        <td>
                                            {{ $clip->site->name }}
                                        </td>
                                        <td>
                                            @foreach ($clip->categories as $category)
                                                <div>{{ $category->name }}</div>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $clip->likes_count }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.clip.edit', $clip->id) }}"
                                                class="btn btn-success btn-sm">更新</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                        {{-- @include('clips.partials.users-clips') --}}
                    </div>
                    <div class="tab-pane fade" id="sites" role="tabpanel" aria-labelledby="sites-tab">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
                            サイトリスト
                        </h2>
                        <div>
                            <button class="btn btn-primary my-2"
                                onclick="location.href='{{ route('admin.site.create') }}'">新規作成</button>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">サイト名</th>
                                    <th scope="col">クリップ数</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sites->getAllSites() as $site)
                                    <tr>
                                        <td>{{ $site->id }}</td>
                                        <td>{{ $site->name }}</td>
                                        <td>{{ $site->clips_count }}</td>
                                        <td>
                                            <a href="{{ route('admin.site.edit', $site->id) }}"
                                                class="btn btn-success btn-sm">更新</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
                            カテゴリリスト
                        </h2>
                        <div>
                            <button class="btn btn-primary my-2"
                                onclick="location.href='{{ route('admin.category.create') }}'">新規作成</button>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">カテゴリ名</th>
                                    <th scope="col">区分</th>
                                    <th scope="col">クリップ数</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories->getAllCategories() as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->classification->name }}</td>
                                        <td>{{ $category->clips_count }}</td>
                                        <td>
                                            <a href="{{ route('admin.category.edit', $category->id) }}"
                                                class="btn btn-success btn-sm">更新</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="classifications" role="tabpanel"
                        aria-labelledby="classifications-tab">
                        {{-- @include('clips.partials.categories-clips') --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
