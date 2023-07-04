<x-layout :pageTitle="$pageTitle">
    <section class="px-6 ">
        <main class="max-w-lg mx-auto ">

            <div class="flex h-screen items-center justify-center">
                <div class="bg-gray-200 bg-opacity-50 p-8 rounded-xl shadow-lg max-w-md w-full mt-4">
                    <h2 class="text-2xl mb-4 text-center">Registration</h2>
                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf

                        <x-form.input name="first_name" title="first name" type="text" />
                        <x-form.input name="last_name" title="last name" type="text" />
                        <x-form.input name="username" title="username" type="text" />
                        <x-form.input name="email" title="email" type="email" />
                        <x-form.input name="password" title="password" type="password" />
                        <x-form.input name="repeated-password" title="repeat password" type="password" />

                        <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded mt-4 focus:outline-none">Register</button>
                    </form>
                </div>
            </div>

        </main>
    </section>
</x-layout>
