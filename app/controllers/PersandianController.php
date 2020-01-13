<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

use App\Forms\RespondenForm;

class PersandianController extends Controller
{
	public function persandianAction()
	{
		$this->response->redirect('persandian/data-responden');
    }
    
    public function respondenAction()
    {
        $this->view->form = new RespondenForm();
    }

    public function storeRespondAction(){
        $id_layanan = 3;

        $nama = $this->request->getPost('nama');
        $kota = $this->request->getPost('asal');
        if($kota == 'Luar'){
            $kota = $this->request->getPost('tulisKota');
        }
        $pekerjaan = $this->request->getPost('pekerjaan');
        $nama_instansi = $this->request->getPost('nama_instansi');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $pendidikan = $this->request->getPost('pendidikan');

        $responden = new Responden();

        $responden->construct($nama, $kota, $pekerjaan, $nama_instansi, $jenis_kelamin, $pendidikan);

        if($responden->save() == FALSE){
            $this->response->redirect('persandian/data-responden');
        }
        else{
            $this->response->redirect('persandian/kuesioner');
        }
    }
};

?>