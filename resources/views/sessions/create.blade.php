<x-layout :pageTitle="$pageTitle">
  <section class="px-6 ">
    <main class="max-w-lg mx-auto ">

  <div class="flex h-screen items-center justify-center ">
    <div class="bg-gray-200 bg-opacity-50 p-8 rounded-xl shadow-lg max-w-md w-full mb-12">
      <h2 class="text-2xl mb-4 text-center">Login</h2>
      <form method="POST" action="/login">
          @csrf
        <div class="mb-4">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
          <input type="text" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none" placeholder="Enter an email" value="{{ old('email') }}" required>
        </div>
        @error('email')
          <p class="text-red-500 text-xs mt-1 mb-1">{{ $message }}</p>
        @enderror
        <div class="mb-4">
          <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none" placeholder="Enter a password" required>
        </div>
        @error('password')
          <p class="text-red-500 text-xs mt-1 mb-1">{{ $message }}</p>
        @enderror
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