<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dives | Blogs</title>
    <link rel="stylesheet" href="assets/styles/blogs.css">
</head>
<body>
    @include("layout.nav")

    <main>
        @auth
        <section class="button-sect">
            <a class="button-add" href="{{ route('blogs.create') }}">Tambah Blogs</a>  
        </section>
        @endauth

        <section>
            <article></article>
            <h1></h1>
            <p></p>
        </section>
        
        @session('Berhasil')
            <script>window.alert("{{ $value }}")</script>
        @endsession

        <section class="main-news">

            <h1 class="Shows">Blogs</h1>
            
            @foreach ($posts as $post)
			<article class="news Shows">
				
                <img src="/images/{{ $post->gambar }}" width="100%" alt="">
                
				<a class="judul-post" href="{{ route('blogs.show', $post->id) }}">{{ $post->judul }}</a>
                <p>{{ Str::words($post->isi,10) }}</p>
                <small>Dibuat Oleh {{ $post->user->name }}</small>
                <small>Dibuat Pada {{ $post->created_at->format('j F Y') }}</small>
                
                
                @if (auth()->id() === $post->user_id)
                <form action="{{ route('blogs.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit">Delete</button>
                    <a href="{{ route('blogs.edit', $post->id) }}">Edit</a>
                </form>
                @endif
                    
			</article>
            @endforeach

		</section>
    </main>

    @include("layout.footer")
</body>
</html>