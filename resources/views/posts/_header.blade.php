<header class="max-w-xl mx-auto mt-20 text-center">

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <!--  Category -->
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl w-32 ">
            <x-category-dropdown />

        </div>

        <!-- Other Filters -->


        <!-- Search -->
        <div class="relative flex flex-col lg:flex-row lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" name="search" placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm" value="{{ request('search') }}" />
            </form>
        </div>
        @auth
            <a href="{{ route('post.create') }}">
                <button
                    class="lg:ml-4 mt-2 lg:mt-0 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                    Create a post
                </button>
            </a>
        @endauth
    </div>
</header>
