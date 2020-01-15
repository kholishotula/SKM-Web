<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class LaporanController extends Controller
{
	public function laporanAction()
	{
		$tahun = date("Y", time()) - 4;
		$id_laporan = LaporanRekapitulasi::find(
			[
				'conditions' => 'tahun_laporan > ' . $tahun,
				'order' => 'tahun_laporan ASC',
			]
		);

		$this->view->laporan = $id_laporan;
	}

	public function createAction()
	{

	}

	public function storeAction()
	{

	}

	public function showAction()
	{

	}

	public function deleteAction()
	{

	}
};

?>