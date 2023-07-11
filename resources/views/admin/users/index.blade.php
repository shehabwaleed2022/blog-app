<x-dashboard-layout title="Users">
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500 text-center">
                            <tr>
                                <th scope="col" class="px-6 py-4 h-8 w-8">Id</th>
                                <th scope="col" class="px-6 py-4 h-8 w-8">Photo</th>
                                <th scope="col" class="px-6 py-4">First name</th>
                                <th scope="col" class="px-6 py-4">Last name</th>
                                <th scope="col" class="px-6 py-4">Username</th>
                                <th scope="col" class="px-6 py-4">Email</th>
                                <th scope="col" class="px-6 py-4">Num of posts</th>
                                <th scope="col" class="px-6 py-4">Created at</th>
                                <th scope="col" class="px-6 py-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b dark:border-neutral-500 text-center">
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium rounded-full"><img
                                            src="{{ asset('storage/' . $user->photo) }}"></td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->first_name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->last_name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->username }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->email }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ count($user->posts) }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->created_at->format('Y-m-d') }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap {{ $user->is_active ? 'text-green-600' : 'text-red-700' }} px-6 py-4">
                                        {{ $user->is_active ? 'Active' : 'Inactive' }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <form method="GET" action="/admin/users/{{ $user->id }}/edit">
                                            @csrf
                                            <button type="submit"
                                                class="px-4 py-2 rounded-md bg-blue-500 text-white ">Edit</button>
                                        </form>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <form method="POST" action="/admin/users/{{ $user->id }}">
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
            {{ $users->links() }}
        </div>

    </div>
</x-dashboard-layout>
