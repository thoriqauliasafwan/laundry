<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    // nama tabel
    protected $table = 'transaksi';
    // nama primary key
    protected $primaryKey = 'id_transaksi';
    // tipe data return
    protected $returnType = 'object';
    // fields yang dapat diubah
    protected $allowedFields = [
        'id_transaksi',
        'tanggal_masuk',
        'tanggal_selesai',
        'nama_pelanggan',
        'berat',
        'id_paket',
        'id_jenis',
        'harga_total',
        'status_bayar',
        'status_laundry'
    ];

    // method untuk get data
    // jika ID ada isinya, maka get data sesuai ID
    public function _get($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }

    // method untuk get data terakhir
    // join dengan tabel paket untuk mendapatkan nama paket
    public function _getLast()
    {
        $result = $this->select('*')
            ->join('paket', 'paket.id_paket = transaksi.id_paket')
            ->orderBy('id_transaksi', 'DESC')
            ->limit(1)
            ->get()
            ->getResult();
        return $result;
    }

    // method untuk get data
    // join dengan tabel paket untuk mendapatkan nama paket
    public function _getWithPaket($id = null)
    {
        if ($id == null) {
            $result = $this->select('transaksi.*, paket.nama_paket, jenis_cuci.pilihan_cuci,')
                ->join('jenis_cuci', 'jenis_cuci.id_jenis = transaksi.id_jenis')
                ->join('paket', 'paket.id_paket = transaksi.id_paket')
                ->get()
                ->getResult();
            return $result;
        } else {
            $result = $this->select('transaksi.*, paket.nama_paket, jenis_cuci.pilihan_cuci, pelanggan.*')
                ->join('pelanggan', 'pelanggan.nama_pelanggan = transaksi.nama_pelanggan')
                ->join('jenis_cuci', 'jenis_cuci.id_jenis = transaksi.id_jenis')
                ->join('paket', 'paket.id_paket = transaksi.id_paket')
                ->where('transaksi.id_transaksi', $id)
                ->get()
                ->getResult();
            return $result;
        }
    }

    // method untuk mendapatkan jumlah pemasukan
    public function _getPemasukan($tanggal_masuk = '')
    {
        if ($tanggal_masuk == null) {
            $result = $this->selectSum('harga_total')
                ->get()
                ->getResult();
            return $result[0];
        } else {
            $result = $this->where('tanggal_masuk', $tanggal_masuk)
                ->selectSum('harga_total')
                ->get()
                ->getResult();
            return $result[0];
        }
    }



    // method untuk mendapatkan jumlah transaksi
    public function _getTransaksi($tanggal_masuk = '')
    {
        if ($tanggal_masuk == null) {
            $result = $this->countAllResults();
            return $result;
        } else {
            $result = $this->where('tanggal_masuk', $tanggal_masuk)
                ->countAllResults();
            return $result;
        }
    }

    // method untuk insert data
    public function _insert($data)
    {
        $this->insert($data);
    }

    // method untuk update data
    public function _update($id, $data)
    {
        $this->update($id, $data);
    }

    // method untuk delete data
    public function _delete($id)
    {
        $this->delete($id);
    }
}
