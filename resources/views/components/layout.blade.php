<!doctype html>

<title>{{ $pageTitle ?? 'Blog' }}</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<script src="../../js/app.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.2/cdn.js"
    integrity="sha512-O+ameuymZr7auqNl/HvUtOOzIMFEB9wwMLAYe3k/clA44a2oGtV+6Xh7+lFiztz0gBN+t27z23xxQQLG67vv9w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <h2>HOME</h2>
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center justify-center">
                @guest
                    <a href="{{ route('register.create') }}" class="text-xs font-bold uppercase">Register</a>
                    <a href="{{ route('login.create') }}" class="text-xs font-bold uppercase ml-6">Login</a>
                @else
                    <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->first_name }}</span>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="text-xs font-semibold text-blue-500 ml-6">Logout</button>
                    </form>
                @endguest
                <a href="#newsletter"
                    class="bg-blue-500 ml-5 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>



        </nav>



        {{ $slot }}


        <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="text" placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                            <div>
                                @error('email')
                                    <span class="text-xs text-red-500"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    <x-flash />
</body>
