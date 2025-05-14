<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dives | Register</title>
    <link rel="stylesheet" href="/assets/styles/Auth/registerForm.css">
</head>
<body>
    <main>

        <section class="header">
            <h1>Halaman Daftar</h1>
        </section>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            {{-- Nama --}}
            <label>Nama</label>
            <input type="text" name="name" placeholder="Ketikkan Nama Anda">

            {{-- Email --}}
            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan Email Anda">

            {{-- Password --}}
            <label>Password</label>
            <input type="password" name="password" id="showPass" placeholder="Masukkan Password">
    
            <section>
                <input type="checkbox" onclick="ShowPW()">
                <p>Lihat Password</p>
            </section>

            <p>Belum Punya Akun? <a href="{{ route('register') }}">Daftar Sekarang!!</a></p>

            <button type="submit">Login</button>

        </form>
    </main>

    <script>
    function ShowPW() {
        var x = document.getElementById("showPass");
        if (x.type === "password") {
            x.type = "text";
            } else {
            x.type = "password";
            }
        }
    </script>
</body>
</html>