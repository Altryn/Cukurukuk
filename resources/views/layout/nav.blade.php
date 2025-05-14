<link rel="stylesheet" href="/assets/styles/header.style.css">

<header>

    <nav>
        <section class="brand">
            <a href="/">Dives</a>
        </section>

        <ul>
            <li><a href="/about">About</a></li>
            <li><a href="{{ route('blogs.index') }}">Blogs</a></li>

            @guest
            <li><a href="{{ route('register') }}">Register</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
            @endguest
            
            @auth
            <li><a href="">{{ Auth::user()->name }}</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button>Logout</button>
                </form>
            </li>
            @endauth
        </ul>
    </nav>

</header>

<style>

</style>