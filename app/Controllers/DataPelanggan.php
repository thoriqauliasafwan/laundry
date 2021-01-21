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
			'userData' => $this->userData
		];
		// print_r($data['transaksi']);
		$level = $this->userData->level;
		if($level == 0){
			return view('Admin/dataPelanggan', $data);
		}else if($level == 1){
			return view('Karyawan/dataPelanggan', $data);
		}
	}


	// method delete 
	public function delete(){
		$pelangganModel = new PelangganModel;
		$id_transaksi = $this->request->uri->getSegment('3');
		$pelangganModel->_delete($id_transaksi);
		return redirect()->to('/DataPelanggan');
	}
}