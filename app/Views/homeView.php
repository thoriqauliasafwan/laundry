<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry.ku</title>
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
    <h1>Selamat Datang!</h1>
    <br>
    <!-- ================= FORM TRANSAKSI ================== -->
    <form action="Home/insert" method="post">
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" required>
        <label for="berat">Berat (Kg)</label>
        <input type="number" name="berat" required>
        <label for="id_paket">Pilih Paket</label>
        <select name="id_paket" id="id_paket">
            <?php foreach ($paket as $paketItem) : ?>
                <option value="<?= $paketItem->id_paket ?>"><?= $paketItem->nama_paket ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="OK">
    </form>

    <!-- ================= Tabel Transaksi =================== -->
    <table>
        <thead>
            <tr>
                <td>ID Transaksi</td>
                <td>Nama Pelanggan</td>
                <td>Berat (Kg)</td>
                <td>Status Pembayaran</td>
                <td>Status Laundry</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $transaksiItem) : ?>
                <tr>
                    <td><?= $transaksiItem->id_transaksi ?></td>
                    <td><?= $transaksiItem->nama_pelanggan ?></td>
                    <td><?= $transaksiItem->berat ?></td>
                    <td><?= $transaksiItem->status_bayar ?></td>
                    <td><?= $transaksiItem->status_laundry ?></td>
                    <td><a href="Detail/index/<?= $transaksiItem->id_transaksi?>">Detail</a> | <a href="Home/delete/<?= $transaksiItem->id_transaksi?>">Hapus</a></td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</body>

</html>