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
			'userData' => $this->userData
		];
		return view('detailView', $data);
	}



	//--------------------------------------------------------------------

}
