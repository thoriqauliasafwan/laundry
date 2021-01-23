<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laundry.Ku Admin</title>

    <!-- Custom fonts for this template-->
    <link href="/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-12">
                    <i class="fas fa-tshirt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Laundry.Ku</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/dataTransaksi">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Data Transaksi</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/dataPelanggan">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pelanggan</span></a>
            </li>

            <!-- Laporan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-laporan" aria-expanded="true" aria-controls="#collapse-laporan">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapse-laporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jenis Laporan:</h6>
                        <a class="collapse-item" href="/Report/Harian">Laporan Harian</a>
                        <a class="collapse-item" href="/Report/Keseluruhan">Laporan Keseluruhan</a>
                    </div>
                </div>
            </li>

            <!-- Pengguna -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pengguna</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jenis Pengguna</h6>
                        <a class="collapse-item" href="/Pengguna/0">Admin</a>
                        <a class="collapse-item" href="/Pengguna/1">Karyawan</a>
                    </div>
                </div>
            </li>

            <!-- Profil -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-pengguna" aria-expanded="true" aria-controls="#collapse-pengguna">
                    <i class="fas fa-fw fa-user"></i>
                    <span><?= $userData->nama ?></span>
                </a>
                <div id="collapse-pengguna" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Aksi:</h6>
                        <a class="collapse-item" href="/Login/Logout">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-auto text-center">
                            <div class="text-gray-600 font-weight-bold mt-5">SELAMAT DATANG</div>
                            <i class="fa fa-user fa-10x mt-5"></i>
                            <div class="text-gray-600 font-weight-bold mt-2">LAUNDRY.KU ADMIN</div>
                        </div>

                    </div>


                    <!-- row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.search').select2({
            placeholder: 'Cari Nama',
            ajax: {
                url: '/Search-Name',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    var results = [];

                    $.each(data, function(index, item) {
                        results.push({
                            id: item.nama_pelanggan,
                            text: item.nama_pelanggan
                        });
                    });

                    return {
                        results: results
                    };
                },
                cache: true
            }
        });
    </script>


    <!-- Bootstrap core JavaScript-->
    <script src="/bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/bootstrap/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/bootstrap/js/demo/datatables-demo.js"></script>

</body>

</html>