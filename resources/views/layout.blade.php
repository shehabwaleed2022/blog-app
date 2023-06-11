<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="posts.css">
</head>
<body>
    <header>
      @yield('banner')
    </header>

    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

    <main>

      @yield('content')
    
    </main>

    <footer>
        <p>&copy; 2023 My Blog</p>
    </footer>
</body>
</html>
