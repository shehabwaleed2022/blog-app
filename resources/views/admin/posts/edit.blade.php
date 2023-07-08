<x-dashboard-layout title="Edit a post">
    <div class="container mx-auto max-w-sm px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Edit ' {{ $post->title }} ' post</h1>

        <form method="POST" action="/admin/posts/{{ $post->id }}"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input title="Post Title" name="title" value="{{ $post->title }}" type="string" />
            <label for="body" class="block mb-2 text-sm font-medium text-gray-700">Content</label>
            <textarea name="body" id="body" cols="30" rows="10"
                class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">{{ $post->body }}</textarea>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">Category</label>

                <select name="category_id" id="category" class="mb-4">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category->id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- <label class="block mb-2 text-sm font-medium text-gray-700">Status</label>
            <div class="flex flex-row gap-5 mt-4 mb-8">
                <div class="flex items-center">
                    <input type="radio" id="option1" name="status" value="active" class="mr-2"
                        {{ $user->is_active ? 'checked' : '' }}>
                    <label for="option1">Active</label>
                </div>

                <div class="flex items-center">
                    <input type="radio" id="option2" name="status" value="inactive" class="mr-2"
                        {{ !$user->is_active ? 'checked' : '' }}>
                    <label for="option2">Inactive</label>
                </div>
            </div> --}}


            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Update
                </button>
            </div>

        </form>
    </div>
</x-dashboard-layout>
