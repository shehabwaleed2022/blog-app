<x-dashboard-layout title="Users">
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4 h-8 w-8">Id</th>
                                <th scope="col" class="px-6 py-4 h-8 w-8">Title</th>
                                <th scope="col" class="px-6 py-4 h-8 w-8">Author</th>
                                <th scope="col" class="px-6 py-4 h-8 w-8">Category</th>
                                <th scope="col" class="px-6 py-4">Content</th>
                                <th scope="col" class="px-6 py-4">Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-4">{{ $post->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $post->title }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        {{ $post->author->first_name . ' ' . $post->author->last_name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $post->category->name }}</td>
                                    <td class="whitespace-wrap px-6 py-4">{{ $post->body }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $post->created_at->format('Y-m-d') }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <form method="GET" action="/admin/posts/{{ $post->id }}/edit">
                                            @csrf
                                            <button type="submit"
                                                class="px-4 py-2 rounded-md bg-blue-500 text-white ">Edit</button>
                                        </form>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <form method="POST" action="/admin/posts/{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-2 rounded-md bg-red-500 text-white ">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</x-dashboard-layout>
