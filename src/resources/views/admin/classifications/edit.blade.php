<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="h3 mb-3">区分編集</div>
                    <form method="POST" action="{{ route('admin.classification.update', $classification->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="name" :value="__('タイトル')" />
                            <input id="name" class="form-control block mt-1 w-full" type="text" name="name"
                                value="{{ $classification->name }}" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <button type="submit" class="btn btn-success mt-1">編集</button>
                    </form>
                    <form action="{{ route('admin.classification.destroy', $classification->id) }}" method="POST">
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
