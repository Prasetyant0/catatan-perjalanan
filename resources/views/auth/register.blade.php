<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">

    <!--<title>Login & Registration Form</title>-->
</head>

<body>
    <div class="background">
        <div class="logo">

        </div>
        <div class="container" style="position: fixed; bottom:15px;">
            <div class="forms-reverse">
                <!-- Registration Form -->
                <div class="form signup-reverse">
                    <span class="title">Registrasi</span>
                    <form id="form" action="/postregister" enctype="multipart/form-data" method="POST" novalidate>
                        @csrf
                        @if (session('message'))
                            <div class="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="alert" id="error" style="display: none"></div>
                        <div class="input-field">
                            <input type="text" id="nama" autocomplete="off" autofocus
                                placeholder="Masukkan Nama anda" name="nama" required>
                            <i class="uil uil-user"></i>
                        </div>
                        <div class="input-field nik">
                            <input type="text" id="nik" placeholder="Masukkan NIK anda" autocomplete="off"
                                name="nik" required>
                            <i class="uil uil-user icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" id="password" class="password" name="password"
                                placeholder="Buat Password" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>
                        <div class="input-field">
                            <i class="uil uil-image icon" style="top:13px"></i>
                            <input type="file" class="form-control" style="margin-top:0px" name="photo" id="photo">
                        </div>
                        <div class="input-field button">
                            <input type="submit" value="Register">
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Sudah terdaftar?
                            <a href="/" class="text login-link">Login Disini</a>
                        </span>
                    </div>
                </div>

                <div class="form login-reverse">
                    <span class="title">Login</span>

                    <form id="form" action="/login" method="POST" novalidate>
                        @csrf
                        @if (session('message'))
                            <div class="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="alert" id="error" style="display: none"></div>
                        <div class="input-field nik">
                            <input type="text" id="nik" placeholder="NIK anda" name="nik" required>
                            <i class="uil uil-user icon"></i>
                        </div>
                        <div class="input-field password">
                            <input type="password" id="password" class="password" name="password"
                                placeholder="Password anda" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>
                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="logCheck">
                                <label for="logCheck" class="text">Remember me</label>
                            </div>

                            {{-- <a href="#" class="text">Forgot password?</a> --}}
                        </div>

                        <div class="input-field button">
                            <input type="submit" value="Login">
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Blm terdaftar?
                            <a href="/register" class="text signup-link">Daftar disini</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/auth.js') }}"></script>
    <script>
        // js code to appear signup and login form
        login.addEventListener("click", () => {
            container.classList.add("active");
        });
        signUp.addEventListener("click", () => {
            container.classList.remove("active");
        });

        const nama = document.getElementById('nama')
        const nik = document.getElementById('nik')
        const password = document.getElementById('password')
        const form = document.getElementById('form')
        const errorElement = document.getElementById('error')

        form.addEventListener('submit', (e) => {
            let messages = []
            if (nama.value === '' || nama.value === null) {
                errorElement.style.display = "block";
                messages.push('Nama User harus diisi')
            }
            if (nama.value.length >= 15) {
                errorElement.style.display = "block";
                messages.push('Nama User Tidak boleh lebih dari 15 karakter')
            }
            if (nik.value.length < 16) {
                errorElement.style.display = "block";
                messages.push('NIK harus memiliki 16 angka')
            }
            if (password.value.length <= 6) {
                errorElement.style.display = "block";
                messages.push('Password harus lebih dari 6 karakter')
            }
            if (password.value.length >= 20) {
                errorElement.style.display = "block";
                messages.push('Password tidak boleh lebih dari 20 karakter')
            }
            if (password.value === 'password') {
                errorElement.style.display = "block";
                messages.push('Password tidak boleh "password"')
            }
            if (messages.length > 0) {
                e.preventDefault()
                errorElement.innerText = messages.join(', ')
            }
        })
    </script>
</body>

</html>
