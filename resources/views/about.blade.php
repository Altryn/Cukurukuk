<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dives | About</title>

    <link rel="stylesheet" href="assets/styles/about.isi.css">
</head>
<body>
    {{-- <header>

		<nav>
			<section class="brand">
				<a href="/">Dives</a>
			</section>

			<ul>
				<li><a href="/about">About</a></li>
				<li><a href="">Blogs</a></li>
				<li><a href="">Register</a></li>
				<li><a href="">Login</a></li>
			</ul>
		</nav>

	</header> --}}

    @include("layout.nav")

    <main>
        <section class="profile-hero">
            <article>
            <h3 class="fade-right">Hello, My Name Is Vall</h3>
            <p class=" delay-3 fade-right">Hello there!, let me introduce myself. My name is Vall and I am the Creator of this Website, it may not be good like the others but this is what i can build. Hope you enjoy</p>
            </article>
            <img class="delay-4 fade-left" src="assets/media/Programmers.svg" alt="">
        </section>

        <section class="materials">
            <h2>The Language that I Use</h2>
            
            <article class="mat-html Shows">
                <img src="assets/media/HTML5.svg" alt="">
                <h3>HTML</h3>
                <p>HTML Stand For Hypertext Markup Language. I Use HTML to make the structure of this web</p>
            </article>
            <article class="mat-css Shows">
                <img src="assets/media/CSS.svg" alt="">
                <h3>CSS</h3>
                <p>CSS Stands For Cassading Style Sheet. I Use CSS to Decorate za Website</p>
            </article>
            <article class="mat-js Shows">
                <img src="assets/media/JavaScript.svg" alt="">
                <h3>Java Script</h3>
                <p>I use Java Script to Make Many Functions within HTML codes</p>
            </article>
            <article class="mat-php Shows">
                <img src="assets/media/PHP.svg" alt="">
                <h3>PHP</h3>
                <p>And PHP is for databases, to store and read it</p>
            </article>
        </section>
    </main>
    
    @include("layout.footer")

</body>
</html>