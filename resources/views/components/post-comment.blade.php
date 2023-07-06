<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-2">
    <div class="mr-4 flex-shrink-0">
        <img src="{{ asset('storage/'. $comment->author->photo) }}" width="60" height="60" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->author->first_name . ' ' . $comment->author->last_name }}</h3>
            <p class="text-xs">Posted <time>{{ $comment->created_at->diffForHumans() }} </time></p>
        </header>
        <p class="mt-4">{{ $comment->body }}</p>
    </div>
</article>
