<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

use App\Forms\KuesionerForm;
use App\Events\AdminKuesionerSecureController;

class KuesionerController extends AdminKuesionerSecureController
{
	public function initialize(){
        $this->messages = [
			'kode_verifikasi' => '',
			'kritik_saran' => ''
		];
        $this->notif = "";
        $this->error = "";
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

        if(!$form->isValid($this->request->getPost())){
            foreach($form->getMessages() as $msg){
                $this->messages[$msg->getField()] = $msg;
            }
        }

        if($this->messages['kode_verifikasi']==null && $this->messages['kritik_saran']==null){
            $id_admin = $this->session->get('auth')['id'];
            $keterangan = $this->request->getPost('kritik_saran');
            $kode_verifikasi = $this->request->getPost('kode_verifikasi');
            $id_layanan = $this->request->getPost('kategori_layanan');
            $aktif = 0;
            $hasil_tags = $this->request->getPost('pilihan');

            if($id_layanan==""){
                $this->response->redirect('kuesioner');
            }
    
            $kuesioner_survei = new Kuesioner();
            $kuesioner_survei->construct($id_admin,$id_layanan,$keterangan,$kode_verifikasi,$aktif);

            if($kuesioner_survei->save()){
                $this->notif = 'Kuesioner berhasil ditambahkan';
                $values = "";

                $query = "INSERT INTO `terdiri_dari` (`id_kuesioner`,`id_pertanyaan`) VALUES";
                foreach ($hasil_tags as $t){
                    if($t != 0){
                        $values .= "(" . $kuesioner_survei->getId() . "," . $t . "),";
                    }
                }
                $values = substr($values,0,strlen($values)-1);
                $query .= $values;
                $this->db->query($query);
            }
            else{
                $this->flashSession->error('Terjadi error saat menambahkan. Coba ulangi kembali'); 
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
        $arr_id = $this->request->getPost("id_kuesioners");

        if($id_kuesioner != null){
            $kuesioner = Kuesioner::findFirst("id_kuesioner=$id_kuesioner");
            if($kuesioner->delete()){
                $query = "DELETE FROM `terdiri_dari` WHERE `id_kuesioner`=$id_kuesioner DELETE CASCADE;";
                $this->db->query($query);

                $this->flashSession->success('Kuesioner berhasil dihapus');
            }
            else{
                $this->flashSession->error('Terjadi error. Coba ulang kembali');
            }
        }
        else if($arr_id != null){
            $intArray = array_map('intval',explode(",",$arr_id));
            foreach($intArray as $idx){
                Kuesioner::findFirst("id_kuesioner=$idx")->delete();

                $query = "DELETE FROM `terdiri_dari` WHERE `id_kuesioner`=$idx;";
                $this->db->query($query);
            }
            $this->flashSession->success('Kuesioner berhasil dihapus');
        } 
        $this->response->redirect('kuesioner');
	}

	public function showAction()
	{
        $temp = Kuesioner::find();
        $pertanyaan = Pertanyaan::find();
        $i = 0;
        $temp2 = [];
        foreach($temp as $t){
            $idx = $t->getIdLayanan();
            $temp2[$i++] = Layanan::findFirst([
                'columns' => 'nama_layanan',
                'conditions' => 'id_layanan = '.$idx ,
            ]);
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
        $this->view->layanan = $temp2;
        $this->view->page = $page;
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
            $this->flashSession->error('Tidak dapat melakukan perbaruan data');
        }
        else{
            $id_kuesioner = $this->request->getPost('id_kuesioner');          
			$kuesioner = Kuesioner::findFirst("id_kuesioner='$id_kuesioner'");

            if($kuesioner==null){
                $this->flashSession->error('Terjadi error saat pencarian data');
            }
            else{
                $id_admin = $this->session->get('auth')['id'];
                $kode_verifikasi = $this->request->getPost('kode_verifikasi');
                $keterangan_kuesioner = $this->request->getPost('kritik_saran');
                $id_layanan = $this->request->getPost('kategori_layanan');
                $pertanyaan =$this->request->getPost('pilihan');
                $aktif = 0;

                $kuesioner->construct($id_admin,$id_layanan,$keterangan_kuesioner,$kode_verifikasi,$aktif);

                if($kuesioner->update()){
                    $this->notif = 'Informasi data kuesioner berhasil di perbarui';

                    $query = "DELETE FROM `terdiri_dari` WHERE `id_kuesioner`=$id_kuesioner;";
                    $this->db->query($query);

                    $query = "INSERT INTO `terdiri_dari` (`id_kuesioner`,`id_pertanyaan`) VALUES";
                    foreach ($pertanyaan as $t){
                        $values .= "(" . $kuesioner->getId() . "," . $t . "),";
                    }
                    $values = substr($values,0,strlen($values)-1);
                    $query .= $values;
                    $this->db->query($query);
                }
                else{
                    $this->flashSession->error('Terjadi error. Coba ulang kembali');
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
            $query1 = $this->modelsManager->createQuery('SELECT * FROM Kuesioner WHERE CONCAT(id_kuesioner,keterangan,kode_verifikasi) LIKE "%'.$cari.'%"');
            $temp = $query1->execute();
            $pertanyaan = Pertanyaan::find();

            $i = 0;
            $temp2 = [];
            foreach($temp as $t){
                $idx = $t->getIdLayanan();
                $temp2[$i++] = Layanan::findFirst([
                    'columns' => 'nama_layanan',
                    'conditions' => 'id_layanan = '.$idx ,
                ]);
            }

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
            $this->view->layanan = $temp2;
            $this->view->error = $this->error;
            $this->view->notif= $this->notif;
            $this->view->form = new KuesionerForm();
        }
    }

    public function changeStatusAction(){
        $idx = $this->request->getPost('id_kuesioner');
        $kuesioner = Kuesioner::findFirst("id_kuesioner='$idx'");

        if($kuesioner != null){
            $id = $kuesioner->getIdLayanan();

            $id_admin = $this->session->get('auth')['id'];
            $kode_verifikasi = $kuesioner->getKode();
            $keterangan_kuesioner = $kuesioner->getKeterangan();
            $id_layanan = $kuesioner->getIdLayanan();
            if($kuesioner->getAktif() == 0){
                $aktif = 1;
            }
            else{
                $aktif = 0;
            }

            $kuesioner->construct($id_admin,$id_layanan,$keterangan_kuesioner,$kode_verifikasi,$aktif);
            if($kuesioner->update()){
                $this->flashSession->success('Data kuesioner berhasil diperbarui');
            }
            else{
                $this->flashSession->error('Data kuesioner gagal diperbarui');
            }
        }
        else{
            $this->flashSession->error('Data kuesioner tidak ditemukan');
        }
        $this->response->redirect('kuesioner');
    }

    public function createPdfAction(){
        $this->view->disable();
        $userId = $this->request->getPost('bbb');   
        $rez['rez'] = Users::findFirstById($userId);
        $html = $this->view->getRender('reports', 'pdf_report', $rez);
        $pdf = new mPDF();
        $pdf->WriteHTML($html, 2);
        $br = rand(0, 100000);
        $ispis = "Pobjeda Rudet-Izvjestaj-".$br;
        $pdf->Output($ispis, "I");
    }
};