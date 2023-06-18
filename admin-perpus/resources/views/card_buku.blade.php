
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kartu Buku</title>

    <!-- Custom fonts for this template-->
    <link href="{{ env("URL_TEMPLATE") }}vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ env("URL_TEMPLATE") }}css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    @foreach ($data->buku as $key => $output)
        <dir class="form-group row">
            <div class="form-group col-sm-4">
                    <div class="card" style="align-items: center;">
                        <img src="https://public-api.qr-code-generator.com/v1/create/free?qr_code_text=$output->uuid_buku" alt="QR-Code" width="300" height="400">
                        <div class="card-content">
                            <h1>{{ $output->nama_buku }}</h1>
                        </div>
                    </div>
                </div>
        </dir>
    @endforeach

    <!-- Bootstrap core JavaScript-->
    <script src="{{ env("URL_TEMPLATE") }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ env("URL_TEMPLATE") }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ env("URL_TEMPLATE") }}vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ env("URL_TEMPLATE") }}js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ env("URL_TEMPLATE") }}vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ env("URL_TEMPLATE") }}js/demo/chart-area-demo.js"></script>
    <script src="{{ env("URL_TEMPLATE") }}js/demo/chart-pie-demo.js"></script>

    <script>
        if (localStorage.getItem('token', 'masuk') === null){
            window.location.href = '{{ env('APP_URL') }}';
        } else if (localStorage.getItem('token', 'masuk') === ''){
            alert();
            window.location.href = '{{ env('APP_URL') }}';
        }

        function keluar() {
            localStorage.removeItem('token');
            window.location.href = '{{ env('APP_URL') }}';
        }
    </script>
</body>

</html>