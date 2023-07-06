@auth
    <form method="POST" action="/posts/{{ $post->id }}/comments" class="border border-gray-200 p-6 rounded-xl">
        @csrf

        <header class="flex items-center">
            <img src="{{ asset('storage/' . auth()->user()->photo )}}" width="40" height="40" class="rounded-full">
            <h2 class="ml-4">Leave a comment !</h2>
        </header>

        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                placeholder="Say somthing {{ auth()->user()->first_name }} !" required>{{ old('body') }}</textarea>
        </div>
        @error('body')
            <p class="text-xs text-red-500">{{ $message }}</p>
        @enderror

        <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
            <button type="submit"
                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Comment</button>
        </div>
    </form>
@else
    <a href="/login">Log in to leave a comment </a>
@endauth
