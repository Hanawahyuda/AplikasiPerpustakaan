
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpustakaan - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ env("URL_TEMPLATE") }}vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ env("URL_TEMPLATE") }}css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" placeholder="Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" placeholder="Password">
                                        </div>
                                        <button type="button" class="btn btn-primary btn-user btn-block" onclick="verifikasi()">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ env("URL_TEMPLATE") }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ env("URL_TEMPLATE") }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ env("URL_TEMPLATE") }}vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ env("URL_TEMPLATE") }}js/sb-admin-2.min.js"></script>

    <script>
        function verifikasi() {
            const username = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (username === '') {
                alert('Username Tidak Boleh Kosong');
            } else if (password === '') {
                alert('Password Tidak Boleh Kosong');
            } else {
                const data = {
                        email: username,
                        password: password
                    };

                    fetch('{{ $url }}/api/login_peminjam', {
                            method: 'POST',
                            body: JSON.stringify(data),
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            alert(data.pesan);
                            if (data.pesan_b) {
                               localStorage.setItem('token', btoa(data.id_user));
                               alert(btoa(data.id_user))
                               window.location.href = '{{ env('APP_URL') . 'dashboard' }}';
                            }
                        })
                        .catch(error => console.error(error))
            }
        }
    </script>
</body>
</html>