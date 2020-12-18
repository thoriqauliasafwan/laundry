<?php namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\TransaksiModel;
use App\Models\JenisCuciModel;

class DataTransaksi extends BaseController
{
	// method index
	public function index()
	{
		// inisialisasi model
		$transaksiModel = new TransaksiModel;
		// mengirim data ke View
		$data = [
			'transaksi' => $transaksiModel->_getWithPaket(),
		];
		// print_r($data['transaksi']);
		return view('DataTransaksi/index', $data);
	}

	// method view by id transaksi
	public function viewById(){
		// inisialisasi model
		$transaksiModel = new TransaksiModel;

		// get id transaksi
		$id_transaksi = $this->request->uri->getSegment(3);

		$data = [
			'transaksi' => $transaksiModel->_getWithPaket($id_transaksi),
		];

		return view('DataTransaksi/view', $data);
	}

	// method update
	public function updateStatus(){
		$model = new TransaksiModel;
		// mengambil id transaksi dari URI Segment
		$id_transaksi = $this->request->uri->getSegment('4');
		// mengambil id opsi dari URI Segment
		$opsi = $this->request->uri->getSegment('3');
		// jika opsi = 1, maka ubah status bayar ke lunas
		// jika opsi = 2, maka ubah status laundry ke selesai
		if($opsi == 1){
			$data = ['status_bayar' => 'lunas'];
			$model->_update($id_transaksi, $data);
		}elseif($opsi == 2){
			$data = ['status_laundry' => 'selesai'];
			$model->_update($id_transaksi, $data);
		}
		return redirect()->to('/DataTransaksi/viewById/'.$id_transaksi);
	}

	// method delete 
	public function delete(){
		$model = new TransaksiModel;
		$id_transaksi = $this->request->uri->getSegment('3');
		$model->_delete($id_transaksi);
		return redirect()->to('/DataTransaksi');
	}
}