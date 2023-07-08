<x-dashboard-layout title="Create a category">
    <div class="container mx-auto max-w-sm px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Create a categoty</h1>

        <form method="POST" action="/admin/categories"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
            @csrf
            <x-form.input title="Category Title" name="name" type="string" />

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Add
                </button>
            </div>

        </form>
    </div>
</x-dashboard-layout>
