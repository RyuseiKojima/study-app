<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-decoration-none">
                        <i class="fa-solid fa-computer me-1"></i>
                        {{ __('Tech Sharing') }}
                    </x-nav-link>
                </div>
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div>
                    <button class="btn btn-primary my-1 mr-2"
                        onclick="location.href='{{ route('clips.create') }}'">新規作成</button>
                </div>
                <!-- 検索機能ここから -->
                <form class="form-inline flex" action="{{ route('clips.search') }}" method="POST">
                    @csrf
                    <div class="mr-2">
                        <label for="keyword" class="sr-only">キーワード</label>
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="キーワード">
                    </div>
                    <div class="mr-2">
                        <button type="submit" class="btn btn-secondary">検索</button>
                    </div>
                </form>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="btn inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.show', Auth::user()->id)" class="text-decoration-none">

                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                class="text-decoration-none">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
