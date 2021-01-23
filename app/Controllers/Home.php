<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\TransaksiModel;
use App\Models\JenisCuciModel;
use App\Models\PelangganModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
	// method index
	public function index()
	{
		// inisialisasi model
		$paketModel = new PaketModel;
		$jenisCuciModel = new JenisCuciModel;
		$transaksiModel = new TransaksiModel;
		// mengirim data ke View

		$data = [
			'paket' => $paketModel->_get(),
			'jenisCuci' => $jenisCuciModel->_get(),
			'transaksi' => $transaksiModel->_getWithPaket(),
			'userData' => $this->userData
		];
		$level = $this->userData->level;
		if ($level == 0) {
			return view('Admin/Home/default', $data);
		} else if ($level == 1) {
			return view('Karyawan/Home/default', $data);
		}
	}

	// method pelanggan baru
	public function newUser()
	{
		// inisialisasi model
		$paketModel = new PaketModel;
		$jenisCuciModel = new JenisCuciModel;
		$transaksiModel = new TransaksiModel;
		// mengirim data ke View
		$data = [
			'paket' => $paketModel->_get(),
			'jenisCuci' => $jenisCuciModel->_get(),
			'transaksi' => $transaksiModel->_getWithPaket(),
			'userData' => $this->userData
		];
		return view('Karyawan/Home/newUser', $data);
	}

	// method insert data transaksi
	// member baru
	public function insertNew()
	{
		// cek apakah form di klik submit
		// atau disebut form mengirim method post
		if ($this->request->getMethod() === 'post') {
			// inisialisasi model
			$model = new TransaksiModel;
			$paketModel = new PaketModel;
			$jenisCuciModel = new JenisCuciModel;
			$pelangganModel = new PelangganModel;

			// mengambil data dari form
			$nama_pelanggan = $this->request->getPost('nama_pelanggan');
			$alamat_pelanggan = $this->request->getPost('alamat_pelanggan');
			$nomor_hp = $this->request->getPost('nomor_hp');
			$berat = $this->request->getPost('berat');
			$id_paket = $this->request->getPost('id_paket');
			$id_jenis = $this->request->getPost('id_jenis');

			// mengambil harga perkilo sesuai paket yang dipilih
			$hargaPaket = $paketModel->_get($id_paket)->kelipatan_harga;
			$durasiPaket = $paketModel->_get($id_paket)->durasi;
			$hargaJenisCuci = $jenisCuciModel->_get($id_jenis)->harga_cuci;

			// menghitung harga total
			$harga_total = $berat * $hargaJenisCuci * $hargaPaket;

			// menghitung tanggal selesai
			$tanggalSekarangObj = new Time('now');
			$tanggalSelesaiObj = $tanggalSekarangObj->addDays($durasiPaket);
			$tanggalSelesai = $tanggalSelesaiObj->toDateString();

			// memasukkan data-data ke dalam satu array $data
			$dataTransaksi = [
				'nama_pelanggan' => $nama_pelanggan,
				'tanggal_selesai' => $tanggalSelesai,
				'berat' => $berat,
				'id_paket' => $id_paket,
				'id_jenis' => $id_jenis,
				'harga_total' => $harga_total,
			];
			$dataPelanggan = [
				'nama_pelanggan' => $nama_pelanggan,
				'alamat_pelanggan' => $alamat_pelanggan,
				'nomor_hp' => $nomor_hp,
			];
			// insert data ke tabel transaksi
			$pelangganModel->_insert($dataPelanggan);
			$model->_insert($dataTransaksi);

			$lastID = $model->_getLast()[0]->id_transaksi;
			// load successView untuk menampilkan konfirmasi transaksi
			return redirect()->to('/DataTransaksi/viewById/' . $lastID);
		}
	}

	// method insert data transaksi
	// member lama
	public function insert()
	{
		// cek apakah form di klik submit
		// atau disebut form mengirim method post
		if ($this->request->getMethod() === 'post') {
			// inisialisasi model
			$model = new TransaksiModel;
			$paketModel = new PaketModel;
			$jenisCuciModel = new JenisCuciModel;

			// mengambil data dari form
			$nama_pelanggan = $this->request->getPost('nama_pelanggan');
			$berat = $this->request->getPost('berat');
			$id_paket = $this->request->getPost('id_paket');
			$id_jenis = $this->request->getPost('id_jenis');

			// mengambil harga perkilo sesuai paket yang dipilih
			$hargaPaket = $paketModel->_get($id_paket)->kelipatan_harga;
			$durasiPaket = $paketModel->_get($id_paket)->durasi;
			$hargaJenisCuci = $jenisCuciModel->_get($id_jenis)->harga_cuci;

			// menghitung harga total
			$harga_total = $berat * $hargaJenisCuci * $hargaPaket;

			// menghitung tanggal selesai
			$tanggalSekarangObj = new Time('now');
			$tanggalSelesaiObj = $tanggalSekarangObj->addDays($durasiPaket);
			$tanggalSelesai = $tanggalSelesaiObj->toDateString();

			// memasukkan data-data ke dalam satu array $data
			$dataTransaksi = [
				'nama_pelanggan' => $nama_pelanggan,
				'tanggal_selesai' => $tanggalSelesai,
				'berat' => $berat,
				'id_paket' => $id_paket,
				'id_jenis' => $id_jenis,
				'harga_total' => $harga_total,
			];
			// insert data ke tabel transaksi
			$model->_insert($dataTransaksi);

			// get data transaksi terakhir untuk konfirmasi

			$lastID = $model->_getLast()[0]->id_transaksi;
			// load successView untuk menampilkan konfirmasi transaksi
			return redirect()->to('/DataTransaksi/viewById/' . $lastID);
		}
	}

	// method untuk search data pelanggan
	public function searchName()
	{
		$pelangganModel = new PelangganModel;
		$name = $this->request->getVar('q');
		$data = $pelangganModel->_search($name);
		echo json_encode($data);
	}

	// method hapus data
	public function delete()
	{
		$model = new TransaksiModel;
		$id_transaksi = $this->request->uri->getSegment('3');
		$model->_delete($id_transaksi);
		return redirect()->to('/');
	}

	//--------------------------------------------------------------------

}
