<x-layout :pageTitle="$pageTitle">
    <section class="px-6 ">
        <main class="max-w-lg mx-auto ">

            <div class="flex h-screen items-center justify-center">
                <div class="bg-gray-200 bg-opacity-50 p-8 rounded-xl shadow-lg max-w-md w-full mt-4">
                    <h2 class="text-2xl mb-4 text-center">Registration</h2>
                    <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                        @csrf

                        <x-form.input name="first_name" title="First name" type="text" required />
                        <x-form.input name="last_name" title="Last name" type="text" required />
                        <x-form.input name="username" title="Username" type="text" required />
                        <x-form.input name="email" title="Email" type="email" required />
                        <x-form.input name="photo" title="Photo" type="file" />
                        <x-form.input name="password" title="Password" type="password" required />
                        <div class="mb-4">
                            <label for="repeated-password"
                                class="block mb-2 text-sm font-medium text-gray-700">repeat password</label>
                            <input type="password" id="repeated-password" name="repeated-password"
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none"
                                required>
                        </div>

                        <x-form.error name="repeated-password" />


                        <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded mt-4 focus:outline-none">Register</button>
                    </form>
                </div>
            </div>

        </main>
    </section>
</x-layout>
