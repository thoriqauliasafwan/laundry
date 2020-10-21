<?php namespace App\Controllers;

// use App\Models\PaketModel;
use App\Models\TransaksiModel;

class Detail extends BaseController
{
	// method index
	public function index()
	{
		$model = new TransaksiModel;
		// mengambil id dari URI Segment
		$id_transaksi = $this->request->uri->getSegment('3');
		// mengirim data ke View
		$data = [
			'transaksi' => $model->_getWithPaket($id_transaksi),
		];
		return view('detailView', $data);
	}

	// method update
	public function update(){
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
		return redirect()->to('/Detail/index/'.$id_transaksi);
	}


	//--------------------------------------------------------------------

}
