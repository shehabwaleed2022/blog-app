<x-layout :pageTitle="$pageTitle">
  <section class="px-6 ">
    <main class="max-w-lg mx-auto ">

  <div class="flex h-screen items-center justify-center ">
    <div class="bg-gray-200 bg-opacity-50 p-8 rounded-xl shadow-lg max-w-md w-full mb-12">
      <h2 class="text-2xl mb-4 text-center">Login</h2>
      <form method="POST" action="/login">
          @csrf

        <x-form.input name="email" title="email" type="email" />
        <x-form.input name="password" title="password" type="password" />

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded mt-4 focus:outline-none">Login</button>
      </form>
      <h3 class="text-base font-bold mb-3 mt-3">Does not have an account?
        <a href="/register" class="text-blue-500 underline">Create one now!</a>
      </h3>
    </div>
  </div>

    </main>
  </section>
</x-layout>