<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

use App\Forms\LaporanRekapForm;
use App\Events\AdminLaporanSecureController;

class LaporanController extends AdminLaporanSecureController
{
	public function initialize(){
		$this->messages = [
			'judul_laporan' => '',
			'tahun_laporan' => '',
			'file_laporan' => ''
		];
        $this->notif = "";
        $this->error = "";
	}

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
		$this->view->notif = $this->notif;
        $this->view->error = $this->error;
        $this->view->messages = $this->messages;
        $this->view->form = new LaporanRekapForm();
	}

	public function storeAction()
	{
        if(!$this->request->isPost()){
            $this->response->redirect();
        }
		$form = new LaporanRekapForm();
				
        if(!$form->isValid($this->request->getPost()))
        {
            foreach($form->getMessages() as $msg)
                $this->message[$msg->getField()] = $msg;
		}
		
        if($this->request->hasFiles()==true) {
			$judul_laporan = $this->request->getPost('judul_laporan');
			$tahun_laporan = $this->request->getPost('tahun_laporan');
			$tgl_upload = date('Y-m-d');
			$file_laporan = "temp.pdf";

			$laporan = new LaporanRekapitulasi();
			$laporan->construct($judul_laporan,$tahun_laporan,$tgl_upload,$file_laporan);

			if($laporan->save()){
				$this->notif = 'Laporan Rekapitulasi berhasil ditambahkan';
				foreach($this->request->getUploadedFiles() as $files) {
					$file_toDB = "files\\rekap\\" . $laporan->getId() . '.' .$files->getExtension();
					$target_file = BASE_PATH . '\\public\\' . $file_toDB;
					$files->moveTo($target_file);
					$laporan->construct($judul_laporan,$tahun_laporan,$tgl_upload,$file_toDB);
					$laporan->update();
				}
				$this->view->form = new LaporanRekapForm();
			}
			else{
				$this->error = 'Terjadi kesalahan saat menyimpan data. Coba ulangi kembali';
			}
        }
		return $this->response->redirect('tampil-rekap');
	}

	public function showAction()
	{


	}

	public function deleteAction()
	{
		if(!$this->request->isPost()){
            return $this->response->redirect('tampil-rekap');
        }

		$id_laporan = $this->request->getPost('id_laporan');

        if($id_laporan == null){
            $this->error = "Tidak dapat menemukan data. Coba ulang kembali";
        }
        else{
            $laporan = LaporanRekapitulasi::findFirst("id_laporan=$id_laporan");
            if($laporan != null){
				$fileLoc = BASE_PATH . '//public//' . $laporan->getFile();
                if($laporan->delete()){
					if(!unlink($fileLoc)){
						$this->error = 'File tidak dapat dihapus';
					}
					else{
						$this->success = "Data laporan berhasil dihapus";
					}
                }
                else{
                    $this->error = "Terjadi error. Coba ulang kembali.";
                }
            }
            else{
                $this->error = "Tidak dapat menemukan data. Coba ulang kembali.";
            }
        }
        $this->response->redirect('tampil-rekap');
	}

	public function listSubmitAction(){
		$temp = SubmitSurvei::find();

		$currentPage = (int) $_GET['page'];
        $paginator = new PaginatorModel(
            [
                'data'  => $temp,
                'limit' => 10,
                'page'  => $currentPage,
            ]
        );
        $page = $paginator->getPaginate();

		$this->view->temp = $temp;
		$this->view->page = $page;
	}

	public function listRekapAction(){
		$temp = LaporanRekapitulasi::find();

		$currentPage = (int) $_GET['page'];
        $paginator = new PaginatorModel(
            [
                'data'  => $temp,
                'limit' => 10,
                'page'  => $currentPage,
            ]
        );
        $page = $paginator->getPaginate();


		$this->view->temp = $temp;
		$this->view->page = $page;
		$this->view->notif = $this->notif;
        $this->view->error = $this->error;
        $this->view->messages = $this->messages;
		$this->view->form = new LaporanRekapForm();
	}

	public function updateAction(){
		if(!$this->request->isPost()){
            $this->response->redirect('tampil-rekap');
        }
		$form = new LaporanRekapForm();

        if(!$form->isValid($this->request->getPost())){
            foreach ($form->getMessages() as $msg){
                $this->messages[$msg->getField()] = $msg;
            }
            $this->error = 'Tidak dapat melakukan perbaruan data';
		}

		if($this->request->hasFiles()==true){
            $id_laporan = $this->request->getPost('id_laporan');          
			$laporan = LaporanRekapitulasi::findFirst("id_laporan=$id_laporan");
           
            if($laporan==null){
                $this->error = 'Terjadi error saat pencarian data';
            }
            else{
				$fileLoc = BASE_PATH . '//public//' . $laporan->getFile();
				if($this->request->hasFiles()==true){
					$judul_laporan = $this->request->getPost('judul_laporan');
					$tahun_laporan = $this->request->getPost('tahun_laporan');
					$tgl_upload = date('Y-m-d');
					$filename = $laporan->getFile();
	
					$laporan->construct($judul_laporan,$tahun_laporan,$tgl_upload,$filename);

					if($laporan->update()){
						if(!unlink($fileLoc)){
							$this->error = 'File lama tidak bisa dihapus';
						}
						else{
							foreach($this->request->getUploadedFiles() as $files) {
								$file_toDB = "files\\rekap\\" . $laporan->getId() . '.' .$files->getExtension();
								$target_file = BASE_PATH . '\\public\\' . $file_toDB;
								$files->moveTo($target_file);
							}
						}
						$this->notif = 'Informasi data laporan berhasil di perbarui';
					}
					else{
						$this->error = 'Terjadi error. Coba ulang kembali';
					}
				}
            }
        }        
       $this->response->redirect('tampil-rekap');
	}
	
	public function searchSubmitAction(){
		$cari = $_GET['search'];

        if($cari == null){
            $this->response->redirect('submission');
        }
        else{
            $query1 = $this->modelsManager->createQuery('SELECT * FROM SubmitSurvei WHERE CONCAT(id_kuesioner,skor_akhir,kritik_saran,tgl_submit) LIKE "%'.$cari.'%"');
            $temp = $query1->execute();

            if($temp->count() <= 0){
                $this->response->redirect('submission');
            }

            $currentPage = (int) $_GET['page'];
            $paginator = new PaginatorModel(
                [
                    'data'  => $temp,
                    'limit' => 10,
                    'page'  => $currentPage,
                ]
            );
            $page = $paginator->getPaginate();

            $this->view->temp = $temp;
            $this->view->page = $page;
            $this->view->notif = $this->notif;
            $this->view->error = $this->error;
			$this->view->success = $this->succes;
		}
	} 

	public function searchRekapAction(){
		$cari = $_GET['search'];

        if($cari == null){
            $this->response->redirect('tampil-rekap');
        }
        else{
            $query1 = $this->modelsManager->createQuery('SELECT * FROM LaporanRekapitulasi WHERE CONCAT(judul_laporan,tahun_laporan,tgl_upload) LIKE "%'.$cari.'%"');
			$temp = $query1->execute();

            if($temp->count() <= 0){
                $this->response->redirect('tampil-rekap');
            }

            $currentPage = (int) $_GET['page'];
            $paginator = new PaginatorModel(
                [
                    'data'  => $temp,
                    'limit' => 10,
                    'page'  => $currentPage,
                ]
            );
            $page = $paginator->getPaginate();

            $this->view->temp = $temp;
            $this->view->page = $page;
            $this->view->notif = $this->notif;
            $this->view->error = $this->error;
			$this->view->success = $this->succes;
			$this->view->form = new LaporanRekapForm();
		}
	} 
};

?>