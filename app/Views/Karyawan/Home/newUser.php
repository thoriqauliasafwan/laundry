<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pelanggan Baru</title>

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
                    <i class="fas fa-fw fa-cart-plus"></i>
                    <span>Transaksi</span></a>
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
                    <div class="card shadow mb-4 mt-4 border-left-primary">
                        <div class="card-header py-3">
                            <div class="text-center text-gray-800 h3">Pelanggan Baru</div>
                        </div>
                        <div class="card-body justify-alignment-left">
                            <form class="user" action="Home/insertNew" method="post">
                                <div class="form-group col justify-alignment-left">
                                    <!-- nama -->
                                    <div class="col">
                                        <label for="nama_pelanggan" class="font-weight-bold">Nama Pelanggan</label>
                                        <input type="text" class="form-control search" name="nama_pelanggan" id="nama_pelanggan"></input>
                                    </div>
                                    <div class="col">
                                        <label for="alamat_pelanggan" class="font-weight-bold">Alamat Pelanggan</label>
                                        <input type="text" class="form-control search" name="alamat_pelanggan" id="alamat_pelanggan"></input>
                                    </div>
                                    <div class="col">
                                        <label for="nomor_hp" class="font-weight-bold">Nomor HP</label>
                                        <input type="text" class="form-control search" name="nomor_hp" id="nomor_hp"></input>
                                    </div>
                                    <!-- umur -->
                                    <div class="col">
                                        <label for="berat" class="font-weight-bold">Berat (Kg)</label>
                                        <input class="form-control" type="number" name="berat" required>
                                    </div>
                                    <div class="col">
                                        <label for="id_paket" class="font-weight-bold">Pilih Jenis Cuci</label>
                                        <select class="form-control" name="id_jenis" id="id_jenis">
                                            <?php foreach ($jenisCuci as $jenisCuciItem) : ?>
                                                <option value="<?= $jenisCuciItem->id_jenis ?>"><?= $jenisCuciItem->pilihan_cuci ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="id_paket" class="font-weight-bold">Pilih Paket</label>
                                        <select class="form-control" name="id_paket" id="id_paket">
                                            <?php foreach ($paket as $paketItem) : ?>
                                                <option value="<?= $paketItem->id_paket ?>"><?= $paketItem->nama_paket ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col justify-content-center">
                                    <div class="col">
                                        <input class="mt-3 btn btn-success btn-user btn-block font-weight-bold" type="submit" value="OK">
                                    </div>
                            </form>
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