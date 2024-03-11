<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('記事') }}
        </h2>
    </x-slot>

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
                                投稿者：{{ $clip->user->name }}&emsp;更新日：{{ $clip->updated_at }}
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
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{{ $clip->memo }}</p>
                        </section>
                    </article>
                </div>
            </div>
        </div>



    </div>
</x-app-layout>
