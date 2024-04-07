<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><a href="{{ $clip->url }}" target="_blank"
                                    rel="noopener noreferrer"
                                    style="color:inherit; text-decoration: none;">{{ $clip->title }}</a></h1>
                            <div class="text-muted fst-italic mb-2">
                                投稿者：
                                @include('components.dark-link', [
                                    'title' => $clip->user->name,
                                    'route' => route('profile.show', $clip->user->id),
                                ])
                                &emsp;更新日：{{ $clip->updated_at }}
                            </div>
                            <div class="fst-italic">
                                サイト
                                <a class="badge bg-secondary text-decoration-none link-light"
                                    href="#!">{{ $clip->site->name }}</a>
                            </div>
                            <div class="fst-italic">
                                カテゴリ
                                @foreach ($clip->categories as $category)
                                    <a class="badge bg-secondary text-decoration-none link-light"
                                        href="#!">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </header>

                        <!-- Post content-->
                        メモ
                        <section class="mb-1 border">
                            <p class="fs-5">{{ $clip->memo }}</p>
                        </section>
                        <button type="button"
                            class="btn btn-link link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                            onClick="history.back()">戻る</button>
                    </article>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
