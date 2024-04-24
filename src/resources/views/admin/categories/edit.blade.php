<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="h3 mb-3">カテゴリ編集</div>
                    <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="name" :value="__('タイトル')" />
                            <input id="name" class="form-control block mt-1 w-full" type="text" name="name"
                                value="{{ $category->name }}" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="classification_id" :value="__('区分')" />
                            <select id="classification_id" class="form-select block mt-1 w-full" type="select"
                                name="classification_id" required />
                            @foreach ($classifications->getAllClassifications() as $classification)
                                <option value={{ $classification->id }}
                                    {{ $classification->id == $category->classification_id ? 'selected' : '' }}>
                                    {{ $classification->name }}</option>
                            @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('classification_id')" class="mt-2" />
                        </div>
                        <button type="submit" class="btn btn-success mt-1">編集</button>
                    </form>
                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-1">削除</button>
                    </form>
                    @include('components.dark-back-button')
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
