<?php namespace App\Controllers;

use App\Models\PelangganModel;

class DataPelanggan extends BaseController
{
	// method index
	public function index()
	{
		// inisialisasi model
		$pelangganModel = new PelangganModel;
		// mengirim data ke View
		$data = [
			'pelanggan' => $pelangganModel->_get(),
		];
		// print_r($data['transaksi']);
		return view('dataPelanggan', $data);
	}


	// method delete 
	public function delete(){
		$pelangganModel = new PelangganModel;
		$id_transaksi = $this->request->uri->getSegment('3');
		$pelangganModel->_delete($id_transaksi);
		return redirect()->to('/DataPelanggan');
	}
}