<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl" />
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <a href="/?category={{ $post->category->name }}"
                        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                        style="font-size: 10px;">{{ $post->category->name }}</a>
                </div>

                <div class="mt-4">
                    <a href="/post/{{ $post->slug }}">
                        <h1 class="text-3xl">
                            {{ $post->title }}
                        </h1>
                    </a>
                    <span class="mt-2 block text-gray-400 text-xs"> Published
                        <time>{{ $post->created_at->diffForHumans() }}</time> </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {{ $post->excerpt }}
                </p>
            </div>
            <div class="mt-4 flex items-center">
                <div class="mr-2">
                    <a href=""> <img src="{{ asset('images/love.png') }}" class="h-6 w-6"></a>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">{{ $post->likes_num }}</p>
                </div>

                <div class="mr-2 ml-4">
                    <img src="{{ asset('images/comment.png') }}" class="h-6 w-6">
                </div>
                <div>
                    <p class="text-gray-600 text-sm">{{ count($post->comments) }}</p>
                </div>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img class="w-16 h-16 rounded-full" src="{{ asset('storage/' . $post->author->photo) }}" />
                    <div class="ml-3">
                        <a href="/?author={{ $post->author->username }}">
                            <h5 class="font-bold">{{ $post->author->first_name . ' ' . $post->author->last_name }}</h5>
                        </a>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/post/{{ $post->slug }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
