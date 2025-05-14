<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/styles/Blog/edit.style.css">
    <title>Edit Blog ID={{ $blog->id }}</title>
</head>
<body>

    @include('layout.nav')

    <main>
        
        <form class="form" action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            
        <h1>Edit Blog {{ $blog->id }}</h1>

        {{-- Images --}}
        <label>Gambar</label>
        <input type="file" onchange="previewFile()" name="gambar">

        <label for="">Gambar Preview</label>
        <img src="" id="image" alt="Preview">

        <label for="">Gambar Sebelumnya</label>
        <img src="/images/{{ $blog->gambar }}" width="80px" height="200" alt="">

        {{-- Judul --}}
        <label class="title">Judul</label>
        <input type="text" name="judul" value="{{ $blog->judul }}" placeholder="Berikan Judul Anda">

        <br>

        {{-- Isi --}}
        <label class="isi">Isi Blogs</label>
        <textarea name="isi" cols="30" rows="10">{{ $blog->isi }}</textarea>

        <br>

        {{-- Submit Button --}}
        <button type="submit">Edit</button>
    </form>

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



    {{-- Untuk Preview Gambar --}}
    <script>
    function previewFile() {
        const preview = document.getElementById("image");
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

    </main>

    @include('layout.footer')

</body>
</html>