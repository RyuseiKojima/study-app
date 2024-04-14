<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h3 class="fw-bolder mb-3">
                                <a
                                    href="{{ $clip->url }}"class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">{{ $clip->title }}</a>
                            </h3>
                            <div class="text-muted fst-italic mb-2">
                                投稿者：
                                @include('components.dark-link', [
                                    'title' => $clip->user->name,
                                    'route' => route('profile.show', $clip->user->id),
                                ])
                                &emsp;更新日：{{ $clip->updated_at }}
                                {{-- ログイン中のユーザがいいねしているかどうか --}}
                                @if ($is_liked_by_auth_user)
                                    <form action="{{ route('likes.destroy', $clip->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger btn btn-sm"><i
                                                class="fa-solid fa-heart"></i>
                                            {{ $like_count }}</button>
                                    </form>
                                @else
                                    <form action="{{ route('likes.store', $clip->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-sm"><i class="fa-solid fa-heart"></i>
                                            {{ $like_count }}</button>
                                    </form>
                                @endif
                            </div>
                            <div class="fst-italic">
                                サイト
                                <a href="{{ route('site.show', $clip->site_id) }}" class="btn btn-secondary btn-sm"
                                    style="--bs-btn-padding-y: .01rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">{{ $clip->site->name }}</a>
                            </div>
                            <div class="fst-italic">
                                カテゴリ
                                @foreach ($clip->categories as $category)
                                    <a href="{{ route('category.show', $category->id) }}"
                                        class="btn btn-secondary btn-sm"
                                        style="--bs-btn-padding-y: .01rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </header>
                        @if (isset($clip->memo))
                            <!-- Post content-->
                            メモ
                            <section class="mb-1 border">
                                <p class="fs-5">{{ $clip->memo }}</p>
                            </section>
                        @endif
                        <div>
                            @include('components.dark-link', [
                                'title' => 'ホーム',
                                'route' => route('dashboard'),
                            ])
                        </div>
                    </article>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
