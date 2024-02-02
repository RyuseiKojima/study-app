<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('記事新規作成') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('clips.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">


                    <div>
                        <x-input-label for="title" :value="__('タイトル')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                            :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="url" :value="__('URL')" />
                        <x-text-input id="url" class="block mt-1 w-full" type="url" name="url"
                            :value="old('url')" required />
                        <x-input-error :messages="$errors->get('url')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="site" :value="__('サイト')" />

                        <x-text-input id="site" class="block mt-1 w-full" type="text" name="site" required />

                        <x-input-error :messages="$errors->get('site')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category" :value="__('カテゴリ')" />

                        <x-text-input id="category" class="block mt-1 w-full" type="text" name="category"
                            required />

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="memo" :value="__('メモ')" />

                        <x-text-input id="memo" class="block mt-1 w-full" type="text" name="memo" />

                        <x-input-error :messages="$errors->get('memo')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <x-primary-button class="ml-4">
                            {{ __('新規作成') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
