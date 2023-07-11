<x-dashboard-layout title="Users">
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">

                    <form method="GET" action="/admin/categories/create">
                        @csrf
                        <button type="submit" class="px-4 py-2 rounded-md bg-green-500 text-white">Add</button>
                    </form>

                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500 text-center">
                            <tr>
                                <th scope="col" class="px-6 py-4 h-8 w-4">Id</th>
                                <th scope="col" class="px-6 py-4 h-8 w-4">Name</th>
                                <th scope="col" class="px-6 py-4 h-8 w-4">Created at</th>
                                <th scope="col" class="px-6 py-4 h-8 w-6">Number of posts</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-4 text-center">{{ $category->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center">{{ $category->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center">
                                        {{ $category->created_at->format('Y-m-d') }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center">
                                        {{ $category->posts_count }}</td>


                                    <td class="whitespace-nowrap px-6 py-4 text-center">
                                        <form method="GET" action="/admin/categories/{{ $category->id }}/edit">
                                            @csrf
                                            <button type="submit"
                                                class="px-4 py-2 rounded-md bg-blue-500 text-white">Edit</button>
                                        </form>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center">
                                        <form method="POST" action="/admin/categories/{{ $category->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-2 rounded-md bg-red-500 text-white">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            {{ $categories->links() }}

        </div>
    </div>
</x-dashboard-layout>
