<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dives | Home</title>

	<link rel="stylesheet" href="/assets/styles/style.css">

	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<section class="tops">
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

	
	<section class="hero">
		
	<article class="hero-content">
		<h3><q>Ngoding Bareng, Tumbuh Bareng</q></h3>
		<p>Dives adalah blog komunitas programmer dari berbagai latar belakang—anak kuliahan, bootcamp, otodidak, hingga profesional—semua saling bantu & belajar bareng</p>
	</article>
		
	</section>
	
</section>
	
	 @session('Berhasil')
            <script>window.alert("{{ $value }}")</script>
        @endsession

	<main>
		<section class="main-news">

			<h1 class="Shows">Recent Article</h1>

			@foreach ($terbaru as $blog)
				
			<article class="news Shows">
				<img src="/images/{{ $blog->gambar }}" width="100%" alt="">
				<h3>{{ $blog->judul }}</h3>
				<small>{{ $blog->created_at->format('j F Y') }}</small>
				<p>{{ Str::words($blog->isi,10) }}</p>
				<a href="{{ route('blogs.show' , $blog->id) }}">Read More</a>
			</article>
			@endforeach

			{{-- <article class="news Shows">
				<img src="/assets/media/berita1.png" width="100%" alt="">
				<h3>Rubik Keluaran China Terbaru</h3>
				<small>20-4-2025</small>
				<p>China baru saja mengumumkan teknologi terbaru untuk para penikmat Rubik</p>
				<button>Read More</button>
			</article>

			<article class="news Shows">
				<img src="/assets/media/berita1.png" width="100%" alt="">
				<h3>Rubik Keluaran China Terbaru</h3>
				<small>20-4-2025</small>
				<p>China baru saja mengumumkan teknologi terbaru untuk para penikmat Rubik</p>
				<button>Read More</button>
			</article>

			<article class="news Shows">
				<img src="/assets/media/berita1.png" width="100%" alt="">
				<h3>Rubik Keluaran China Terbaru</h3>
				<small>20-4-2025</small>
				<p>China baru saja mengumumkan teknologi terbaru untuk para penikmat Rubik</p>
				<button>Read More</button>
			</article>

			<article class="news Shows">
				<img src="/assets/media/berita1.png" width="100%" alt="">
				<h3>Rubik Keluaran China Terbaru</h3>
				<small>20-4-2025</small>
				<p>China baru saja mengumumkan teknologi terbaru untuk para penikmat Rubik</p>
				<button>Read More</button>
			</article>

			<article class="news Shows">
				<img src="/assets/media/berita1.png" width="100%" alt="">
				<h3>Rubik Keluaran China Terbaru</h3>
				<small>20-4-2025</small>
				<p>China baru saja mengumumkan teknologi terbaru untuk para penikmat Rubik</p>
				<button>Read More</button>
			</article> --}}

		</section>

		<section class="category">

			<h3 class="category-head Shows">Kategori</h3>

			<article class="Shows"><a href="">Tutorial & How To</a></article>
			<article class="Shows"><a href="">Projects</a></article>
			<article class="Shows"><a href="">Opinions</a></article>
			<article class="Shows"><a href="">Solving</a></article>

		</section>

		<section class="daily">


			<h3>Kata Kata Hari Ini</h3>
			<p>"Jangan takut untuk mencoba, karena kegagalan adalah bagian dari perjalanan menuju kesuksesan." </p>

		</section>

	</main>
	{{-- <footer>

		<section class="brand-name">
			<h2>Dives</h2>
		</section>

		<section class="social-media">
			<ul>
				<li><i class='bx bxl-instagram'></i></li>
				<li><i class='bx bxl-facebook-circle'></i></li>
				<li><i class='bx bxl-twitter' ></i></li>
				<li><i class='bx bxl-youtube' ></i></li>
			</ul>
		</section>

		<section class="copyright">
			<p>&copy;2025 Dives All Rights Reserved</p>
		</section>


	</footer> --}}

	@include("layout.footer")
</body>
</html>