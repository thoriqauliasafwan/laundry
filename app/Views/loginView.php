<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laundry.Ku - Login</title>

    <!-- Custom fonts for this template-->
    <link href="/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .login-img {
            background: url("/bootstrap/img/stunmap.jpg");
            background-position: center;
            background-size: cover;
            width: 100%;
            padding-top: 56.25%;
            /* 1:1 Aspect Ratio */
        }
    </style>

</head>

<body class="bg-gradient-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-7">

                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0 border-bottom-primary">
                        <div class="d-none d-lg-block login-img"></div>
                        <div class="d-flex justify-content-center">
                            <div class="col-lg-10">
                                <div class="p-5 text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                                    <?= $errorMessage ?>
                                    <form class="user" action="/Login/check" method="post">
                                        <div class="form-group">
                                            <input required type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input required type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>
                                        <hr>
                                        <!-- <a class="btn btn-success btn-user btn-block text-white" href="/Auth/Register">Daftar</a> -->
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
    <script src="/bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/bootstrap/js/sb-admin-2.min.js"></script>

</body>

</html>