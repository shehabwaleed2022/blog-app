<x-layout :pageTitle="$pageTitle">

    @include ('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-post-featured-card :post="$posts[0]" />

            <div class="lg:grid lg:grid-cols-3">
                @foreach ($posts->skip(1) as $post)
                    <article
                        class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                        <div class="py-6 px-5">
                            <div>
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration"
                                    class="rounded-xl" />
                            </div>

                            <div class="mt-8 flex flex-col justify-between">
                                <header>
                                    <div class="space-x-2">
                                        <x-category-button :category="$post->category" />


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

                                <div class="text-sm mt-4">
                                    <p>
                                        {{ $post->excerpt }}
                                    </p>

                                </div>

                                <div class="mt-4 flex items-center">

                                    <div class="mr-2">
                                        <form method="POST" action="/like/{{ $post->id }}">
                                            @csrf
                                            @php
                                                $isLiked = false;
                                                foreach ($post->likes as $like) {
                                                    if ($like->user_id == auth()->user()->id) {
                                                        $isLiked = true;
                                                    }
                                                }
                                            @endphp
                                            <button type="submit"><img
                                                    src="{{ asset('images/' .( $isLiked ? 'loved.png': 'love.png')) }}"
                                                    class="h-6 w-6"></button>
                                        </form>
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
                                        <img class="w-16 h-16 rounded-full"
                                            src="{{ asset('storage/' . $post->author->photo) }}" />
                                        <div class="ml-3">
                                            <a href="/?author={{ $post->author->username }}">
                                                <h5 class="font-bold">
                                                    {{ $post->author->first_name . ' ' . $post->author->last_name }}
                                                </h5>
                                            </a>
                                        </div>
                                    </div>

                                    <div>
                                        <a href="/post/{{ $post->slug }}"
                                            class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read
                                            More</a>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                <p class="text-center">No posts now , come back later. </p>
        @endif
        </div>
        {{ $posts->links() }}

    </main>


</x-layout>
