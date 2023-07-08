<x-dashboard-layout title="Edit a post">
    <div class="container mx-auto max-w-sm px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Edit {{ $category->name }} categoty</h1>

        <form method="POST" action="/admin/categories/{{ $category->id }}"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input title="Category Title" name="name" value="{{ $category->name }}" type="string" />

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
