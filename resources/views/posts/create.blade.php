<x-layout :pageTitle="$pageTitle">
    <section class="px-6 py-8">

        <div class="container mx-auto max-w-sm px-4 py-8">
            <h1 class="text-3xl font-bold mb-4">Create a New Post</h1>

            <form method="POST" action="{{ route('posts.create.store') }}"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="post-title">Post Title</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="post-title" type="text" name="title" placeholder="Enter the title of your post"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="post-body">Post Body</label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="post-body" name="body" placeholder="Enter the body of your post" value="{{ old('body') }}"></textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="thumbnail">thumbnail</label>
                    <input type="file" name="thumbnail">
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">Category</label>

                    <select name="category_id" id="category" class="mb-4">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach

                    </select>
                </div>


                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Create Post
                    </button>
                </div>

            </form>
        </div>

    </section>
</x-layout>
