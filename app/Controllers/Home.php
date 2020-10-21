<?php namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\TransaksiModel;

class Home extends BaseController
{
	// method index
	public function index()
	{
		// inisialisasi model
		$model = new PaketModel;
		$transaksiModel = new TransaksiModel;
		// mengirim data ke View
		$data = [
			'paket' => $model->_get(),
			'transaksi' => $transaksiModel->_getWithPaket(),
		];
		return view('homeView', $data);
	}

	// method insert data transaksi
	public function insert(){
		// cek apakah form di klik submit
		// atau disebut form mengirim method post
		if($this->request->getMethod() === 'post'){
			// inisialisasi model
			$model = new TransaksiModel;
			$paketModel = new PaketModel;

			// mengambil data dari form
			$nama_pelanggan = $this->request->getPost('nama_pelanggan');
			$berat = $this->request->getPost('berat');
			$id_paket = $this->request->getPost('id_paket');

			// mengambil harga perkilo sesuai paket yang dipilih
			$harga_per_kilo = $paketModel->_get($id_paket)->harga_per_kilo;
			
			// menghitung harga total
			$harga_total = $berat * $harga_per_kilo;

			// memasukkan data-data ke dalam satu array $data
			$data = [
				'nama_pelanggan' => $nama_pelanggan,
				'berat' => $berat,
				'id_paket' => $id_paket,
				'harga_total' => $harga_total,
			];
			// insert data ke tabel transaksi
			$model->_insert($data);

			// get data transaksi terakhir untuk konfirmasi
			$data = [
				'transaksi' => $model->_getLast(),
			];
			// load successView untuk menampilkan konfirmasi transaksi
			return view('successView', $data);
		}
	}

	// method hapus data
	public function delete(){
		$model = new TransaksiModel;
		$id_transaksi = $this->request->uri->getSegment('3');
		$model->_delete($id_transaksi);
		return redirect()->to('/');
	}

	//--------------------------------------------------------------------

}
