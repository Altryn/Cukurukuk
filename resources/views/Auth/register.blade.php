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

        <form action="{{ route('register') }}" method="POST">
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
            
            {{-- Konfirmasi Password --}}
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="showConfPass" placeholder="Konfirmasi Password Anda">
        
            <section>
                <input type="checkbox" onclick="ShowPW()">
                <p>Lihat Password</p>
            </section>

            <p>Sudah Punya Akun? <a href="{{ route('login') }}">Login Sekarang!!</a></p>

            <button type="submit">Daftar</button>

        </form>
    </main>

    <script>
    function ShowPW() {
        var x = document.getElementById("showPass");
        var y = document.getElementById("showConfPass");
        if (x.type === "password" && y.type === "password") {
            x.type = "text";
            y.type = "text";
            } else {
            x.type = "password";
            y.type = "password";
            }
        }
    </script>
</body>
</html>