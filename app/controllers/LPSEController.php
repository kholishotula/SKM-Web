<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

use App\Forms\RespondenForm;

class LPSEController extends Controller
{
	public function lpseAction()
	{
		$this->response->redirect('lpse/data-responden');
    }
    
    public function respondenAction()
    {
        $this->view->form = new RespondenForm();
    }

    public function storeRespond(){
        $id_layanan = 1;

        $nama = $this->request->getPost('nama');
        $nama_instansi = $this->request->getPost('nama_instansi');
        $jabatan = $this->request->getPost('jabatan');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $pendidikan = $this->request->getPost('pendidikan');

        
    }
};

?>