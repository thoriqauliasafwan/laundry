<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry.Ku</title>
</head>

<body>
    <h1>Detail Transaksi</h1>
    <br>
    <?php foreach ($transaksi as $transaksiItem) : ?>
        ID Transaksi <br>
        <?= $transaksiItem->id_transaksi ?> <br>
        Tanggal <br>
        <?= $transaksiItem->tanggal ?> <br>
        Nomor HP <br>
        <?= $transaksiItem->nomor_hp ?> <br>
        Berat (Kg) <br>
        <?= $transaksiItem->berat ?> Kg <br>
        Paket <br>
        <?= $transaksiItem->nama_paket ?> <br>
        Harga Total <br>
        Rp <?= $transaksiItem->harga_total ?> <br>
        Status Pembayaran <br>
        <?= $transaksiItem->status_bayar ?> <br>
        Status Laundry <br>
        <?= $transaksiItem->status_laundry ?> <br>
    <?php endforeach ?>
    <br>
    <a href="/Detail/update/1/<?= $transaksiItem->id_transaksi ?>">Pelanggan Sudah Bayar</a>
    <br>
    <a href="/Detail/update/2/<?= $transaksiItem->id_transaksi ?>">Laundry Selesai</a>
    <br>
    <a href="/" class="btn btn-primary">OK</a>
</body>

</html>