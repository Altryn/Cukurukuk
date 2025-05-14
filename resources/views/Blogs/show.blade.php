<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/styles/Blog/show.style.css">
    <title> Blogs {{ $post->id }}</title>
</head>
<body>

    @include('layout.nav')
    
    <main>

    <section  class="img-container">
        <img src="/images/{{ $post->gambar }}" width="fit-content" alt="">
    </section>

    <section>
        <h1>{{ $post->judul }}</h1>
        <p>{{ $post->isi }}</p>
    </section>
</main>

@include('layout.footer')

</body>
</html>