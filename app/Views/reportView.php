<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry.ku - Laporan</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h1>Laporan Transaksi Tanggal <?= $tanggal ?></h1>
    <br>
    <a href="/">Home</a>
    <hr>
    <!-- ================= FORM TRANSAKSI ================== -->
    <form action="Report" method="post">
        <label for="nama_pelanggan">Pilih Tanggal</label>
        <input type="date" name="tanggal" required value="<?= $tanggal ?>">
        <input type="submit" value="OK">
    </form>

    <!-- ================= Tabel Transaksi =================== -->
    <table>
        <thead>
            <tr>
                <td>Tanggal</td>
                <td>Jumlah Pemasukan</td>
                <td>Jumlah Transaksi</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $tanggal ?></td>
                <td><?php if ($harga_total->harga_total != null) {
                        echo "Rp " . $harga_total->harga_total;
                    } else {
                        echo "belum ada data";
                    } ?></td>
                <td><?php if ($total_transaksi != null) {
                        echo $total_transaksi . " transaksi";
                    } else {
                        echo "belum ada data";
                    } ?></td>
            </tr>

        </tbody>
    </table>

    <h2>Laporan Keseluruhan</h2>
    <!-- ================= Tabel Transaksi =================== -->
    <table>
        <thead>
            <tr>
                <td>Jumlah Pemasukan</td>
                <td>Jumlah Transaksi</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php if ($harga_total_keseluruhan->harga_total != null) {
                        echo "Rp " . $harga_total_keseluruhan->harga_total;
                    } else {
                        echo "belum ada data";
                    } ?></td>
                <td><?php if ($total_transaksi_keseluruhan != null) {
                        echo $total_transaksi_keseluruhan . " transaksi";
                    } else {
                        echo "belum ada data";
                    } ?></td>
            </tr>

        </tbody>
    </table>
</body>

</html>