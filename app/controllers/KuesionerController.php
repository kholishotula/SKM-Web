<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

use App\Forms\KuesionerForm;

class KuesionerController extends Controller
{
	public function initialize(){
        $this->messages = [
			'kode_verifikasi' => '',
			'kritik_saran' => ''
		];
        $this->notif = "";
        $this->error = "";
    }
	
	public function laporanAction()
	{
		
    }
    
	public function createAction()
	{
		$this->view->notif = $this->notif;
        $this->view->error = $this->error;
        $this->view->messages = $this->messages;
        $this->view->form = new KuesionerForm();
    }
    
    public function storeAction()
	{
        if(!$this->request->isPost())
            $this->response->redirect();

        $form = new KuesionerForm();
        if(!$this->session->has('auth')){
            $this->error = 'Anda harus log in terlebih dahulu untuk menambahkan data';
            $this->dispatcher->forward(['action' => 'index']);
        }

        if(!$form->isValid($this->request->getPost())){
            foreach($form->getMessages() as $msg){
                $this->messages[$msg->getField()] = $msg;
            }
        }

        if($this->messages['kode_verifikasi']==null && $this->messages['kritik_saran']==null){
            $id_admin = $this->session->get('auth')['id'];
            $model_kuesioner = 'Online'; 
            $kritik_saran = $this->request->getPost('kritik_saran');
            $kode_verifikasi = $this->request->getPost('kode_verifikasi');
            $nama_layanan = $this->request->getPost('kategori_layanan');
            $hasil_tags = $this->request->getPost('pilihan');

            $stringArray = preg_replace("/[^0-9\,]/", "", $hasil_tags);
            $intArray = array_map('intval',explode(",",$stringArray));
    
            $kuesioner_survei = new Kuesioner();
            $kuesioner_survei->construct($id_admin,$model_kuesioner,$kritik_saran,$kode_verifikasi,$nama_layanan);

            if($kuesioner_survei->save()){
                $this->notif = 'Kuesioner berhasil ditambahkan';
                $values = "";

                $query = "INSERT INTO `terdiri_dari` (`id_kuesioner`,`id_pertanyaan`) VALUES";
                foreach ($intArray as $t){
                    $values .= "(" . $kuesioner_survei->getId() . "," . $t . "),";
                }
                $values = substr($values,0,strlen($values)-1);
                $query .= $values;
                $this->db->query($query);
            }
            else{
                $this->error = 'Terjadi error saat menambahkan. Coba ulangi kembali'; 
            }
        }
        $this->response->redirect('kuesioner');
    }
    
    public function deleteAction()
	{
		if(!$this->request->isPost()){
            return $this->response->redirect('kuesioner');
        }

        $id_kuesioner = $this->request->getPost('id_kuesioner');
        if($id_kuesioner == null){
            $this->error = "Tidak dapat menemukan data. Coba ulang kembali";
        }
        else{
            $kuesioner = Kuesioner::findFirst("id_kuesioner=$id_kuesioner");
            if($kuesioner != null){
                if($kuesioner->delete()){
                    $this->success = "Kuesioner berhasil dihapus";
                }
                else{
                    $this->error = "Terjadi error. Coba ulang kembali.";
                }
            }
            else{
                $this->error = "Tidak dapat menemukan data. Coba ulang kembali.";
            }
        }
        $this->response->redirect('kuesioner');
	}

	public function showAction()
	{
        $temp = Kuesioner::find();
        $pertanyaan = Pertanyaan::find();

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
        $this->view->pertanyaan = $pertanyaan;
        $this->view->page = $page;
        $this->view->error = $this->error;
        $this->view->notif = $this->notif;
        $this->view->form = new KuesionerForm();
    }
    
    public function updateAction(){
		if(!$this->request->isPost()){
            $this->response->redirect('kuesioner');
        }
		$form = new KuesionerForm();

        if(!$form->isValid($this->request->getPost())){
            foreach ($form->getMessages() as $msg){
                $this->messages[$msg->getField()] = $msg;
            }
            $this->error = 'Tidak dapat melakukan perbaruan data';
        }
        else{
            $id_kuesioner = $this->request->getPost('id_kuesioner');          
			$kuesioner = Kuesioner::findFirst("id_kuesioner='$id_kuesioner'");

            if($kuesioner==null){
                $this->error = 'Terjadi error saat pencarian data';
            }
            else{
                $id_admin = $this->session->get('auth')['id'];
                $model_kuesioner = 'Online'; 
                $kode_verifikasi = $this->request->getPost('kode_verifikasi');
                $keterangan_kuesioner = $this->request->getPost('kritik_saran');
                $nama_layanan = $this->request->getPost('kategori_layanan');
                $pertanyaan =$this->request->getPost('pilihan');

                $stringArray = preg_replace("/[^0-9\,]/", "", $pertanyaan);
                $intArray = array_map('intval',explode(",",$stringArray));

                $kuesioner->construct($id_admin,$model_kuesioner,$keterangan_kuesioner,$kode_verifikasi,$nama_layanan);

                if($kuesioner->update()){
                    $this->notif = 'Informasi data kuesioner berhasil di perbarui';

                    $id = intval($id_kuesioner);
                    $query = "DELETE FROM `terdiri_dari` WHERE `id_kuesioner`=$id;";
                    $this->db->query($query);

                    $query = "INSERT INTO `terdiri_dari` (`id_kuesioner`,`id_pertanyaan`) VALUES";
                    foreach ($intArray as $t){
                        $values .= "(" . $kuesioner->getId() . "," . $t . "),";
                    }
                    $values = substr($values,0,strlen($values)-1);
                    $query .= $values;
                    $this->db->query($query);
                }
                else{
                    $this->error = 'Terjadi error. Coba ulang kembali';
                }
            }
        }        
       return $this->response->redirect('kuesioner');
    }

    public function searchAction(){
        $cari = $_GET['search'];

        if($cari == null){
            $this->response->redirect('kuesioner');
        }
        else{
            $query1 = $this->modelsManager->createQuery('SELECT * FROM Kuesioner WHERE CONCAT(id_kuesioner,kritik_saran,kode_verifikasi) LIKE "%'.$cari.'%"');
            $temp = $query1->execute();
            $pertanyaan = Pertanyaan::find();

            if($temp == null){
                $this->response->redirect('kuesioner');
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
            $this->view->pertanyaan = $pertanyaan;
            $this->view->page = $page;
            $this->view->error = $this->error;
            $this->view->notif= $this->notif;
            $this->view->form = new KuesionerForm();
        }
    }
};