<x-dashboard-layout title="Edit a user">
    <div class="container mx-auto max-w-sm px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Edit {{ $user->first_name }}'s account</h1>

        <form method="POST" action="/admin/users/{{ $user->id }} "
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input title="Photo" name="photo" value="{{$user->photo}}" type="file" />
            <x-form.input title="First Name" name="first_name" value="{{ $user->first_name }}" type="string" />
            <x-form.input title="Last Name" name="last_name" value="{{ $user->last_name }}" type="string" />
            <x-form.input title="Username" name="username" value="{{ $user->username }}" type="string" />
            <x-form.input title="Email" name="email" value="{{ $user->email }}" type="email" />
            <x-form.input title="Password" name="password" value="*******" type="password" />



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
