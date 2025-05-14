<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/styles/Blog/create.style.css">
    <title>Blogs Create</title>
</head>
<body>
    @include('layout.nav')
@auth
    
<main>
    
    <form class="form" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
    <h1>Buat Blog Anda</h1>

    {{-- Gambar --}}
        
    <label>Gambar
    <input type="file" onchange="previewFile()" name="gambar">
    </label>
    <br>

    {{-- Preview --}}
    <img src="" height="200" alt="Preview">
    <br>

    {{-- Judul --}}
    <label class="title">Judul</label>
    <input type="text" name="judul" placeholder="Berikan Judul Anda">
    
    <br>
    
    {{-- Isi --}}
    <label class="isi">Isi Blogs</label>
    <textarea name="isi" cols="30" rows="10"></textarea>
    
    <br>
    {{-- Submit Button --}}
    <button type="submit">Tambah</button>
    
</form>
@endauth

<aside>

    <h1>Blogs</h1>

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
</aside>

@guest
    <h4>Login Untuk Membuat Blog</h4>
@endguest
</main>


    @include('layout.footer')

    {{-- Untuk Preview Gambar --}}
    <script>
    function previewFile() {
        const preview = document.querySelector("img");
        const file = document.querySelector("input[type=file]").files[0];
        const reader = new FileReader();

    reader.addEventListener(
        "load",
            () => {
            // convert image file to base64 string(Ngubah Gambar Ke Base 64 String )
            preview.src = reader.result;
            },
        false,
    );

    if (file) {
        reader.readAsDataURL(file);
    }
}

    </script>
</body>
</html>