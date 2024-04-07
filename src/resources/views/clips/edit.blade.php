<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('clips.update', $clip->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div>
                            <x-input-label for="title" :value="__('タイトル')" />
                            <input id="title" class="form-control block mt-1 w-full" type="text" name="title"
                                value="{{ $clip->title }}" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="url" :value="__('URL')" />
                            <input id="url" class="form-control mt-1 w-full" type="url" name="url"
                                value="{{ $clip->url }}" required />
                            <x-input-error :messages="$errors->get('url')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="site_id" :value="__('サイト')" />
                            <select id="site_id" class="form-select block mt-1 w-full" type="select" name="site_id"
                                required />
                            @foreach ($sites as $site)
                                <option value={{ $site->id }} {{ $site->id == $clip->site_id ? ':selected' : '' }}>
                                    {{ $site->name }}</option>
                            @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('site')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="category_id[]" :value="__('カテゴリ')" />
                            @foreach ($classifications as $classification)
                                <div>{{ $classification->name }}</div>
                                @foreach ($classification->categories as $category)
                                    <input type="checkbox" name="category_id[]" class="btn-check"
                                        id="{{ $category->id }}" value="{{ $category->id }}"
                                        {{ in_array($category->id, array_column($clip->categories->toArray(), 'id')) ? 'checked' : '' }}
                                        onclick="func()">
                                    <label for="{{ $category->id }}" class="btn btn-outline-secondary mb-1">
                                        {{ $category->name }}
                                    </label>
                                @endforeach
                            @endforeach
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="memo" :value="__('メモ')" />
                            <textarea id="memo" class="form-control mt-1 w-full" type="text" name="memo" /> {{ $clip->memo }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-1">編集</button>
                    </form>
                    <form action="{{ route('clips.destroy', $clip->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-1">削除</button>
                    </form>
                    @include('components.dark-back-button')
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
