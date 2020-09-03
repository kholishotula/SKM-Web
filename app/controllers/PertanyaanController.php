<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

use App\Forms\PertanyaanForm;
use App\Events\AdminPertanyaanSecureController;

class PertanyaanController extends AdminPertanyaanSecureController
{   
    public function init(){
        $this->messages = ['konten_pertanyaan' => ''];
        $this->notif = "";
        $this->error = "";
    }

	public function createAction()
	{
        $this->view->notif = $this->notif;
        $this->view->error = $this->error;
        $this->view->messages = $this->messages;
        $this->view->form = new PertanyaanForm();
    }
    
    public function storeAction()
	{
        if(!$this->request->isPost())
            $this->response->redirect();

        $form = new PertanyaanForm();
        if(!$this->session->has('auth')){
            $this->flashSession->error('Anda harus log in terlebih dahulu untuk menambahkan data');
            $this->dispatcher->forward(['action' => 'index']);
        }

        if(!$form->isValid($this->request->getPost())){
            foreach($form->getMessages() as $msg){
                $this->messages[$msg->getField()] = $msg;
            }
        }

        if($this->messages['konten_pertanyaan']==null){
            $konten_pertanyaan = "'" . $this->request->getPost('konten_pertanyaan') ."'";
            $tgl_submit = date('Y-m-d');

            $tanya = new Pertanyaan();
            $tanya->construct($konten_pertanyaan);

            if($tanya->save()){
                $this->notif = 'Pertanyaan berhasil ditambahkan';
            }
            else{
                $this->error = 'Terjadi error saat menambahkan. Coba ulangi kembali';
            }
        }
        $this->response->redirect('pertanyaan');
    }

    public function editAction()
	{
        if(!$this->request->hasQuery('id_pertanyaan') && !$this->dispatcher ){
            return $this->response->redirect('pertanyaan');
        }

        $this->view->notif = $this->notif;
        $this->view->error = $this->error;
        $this->view->messages = $this->messages;
        if($this->request->hasQuery('id_pertanyaan'))
            $id_pertanyaan = $this->request->getQuery('id_pertanyaan');
       
        else if($this->dispatcher)
            $id_pertanyaan = $this->dispatcher->getParams()['id_pertanyaan'];
        
        $pertanyaan = Pertanyaan::findFirst([
            'columns' => "id_pertanyaan",
            'conditions' => "id_pertanyaan= '$id_pertanyaan'"
        ]);

        $form = new PertanyaanForm($pertanyaan);
        $this->view->form = $form;
        $this->view->pertanyaan = $pertanyaan;
    }

    public function updateAction(){
        if(!$this->session->has('auth'))
            $this->error = 'Anda harus log in terlebih dahulu untuk memperbarui data';

        $form = new PertanyaanForm();

        if(!$form->isValid($this->request->getPost())){
            foreach($form->getMessages() as $msg){
                $this->messages[$msg->getField()] = $msg;
            }
            $this->error = 'Tidak dapat memperbarui data'; 
        }
        else{
            $id_pertanyaan = $this->request->getPost('id_pertanyaan');
            $pertanyaan = Pertanyaan::findFirst([
                'conditions' => "id_pertanyaan='$id_pertanyaan'"
            ]);

            if($pertanyaan == null){
                $this->error = 'Terjadi error saat mencari data';
            }
            else{
                $konten_pertanyaan = $this->request->getPost()['konten_pertanyaan'];
                $pertanyaan->construct($konten_pertanyaan);

                if($pertanyaan->update()){
                    $this->notif = 'Data berhasil diperbarui';
                }
                else{
                    $this->error = 'Terjadi kesalahan. Coba ulang kembali';
                }
            }
        }
        $this->response->redirect('pertanyaan');
    }
    
    public function deleteAction()
	{
		if(!$this->request->isPost()){
            return $this->response->redirect('pertanyaan');
        }

        $id_pertanyaan = $this->request->getPost('id_pertanyaan');
        $arr_id = $this->request->getPost("id_pertanyaans");

        if($id_pertanyaan != null){
            $pertanyaan = Pertanyaan::findFirst("id_pertanyaan=$id_pertanyaan");
            if($pertanyaan->delete()){
                $query = "DELETE FROM `terdiri_dari` WHERE `id_pertanyaan`=$id_pertanyaan;";
                $this->db->query($query);

                $this->flashSession->success('Pertanyaan berhasil dihapus');
            }
            else{
                $this->flashSession->error('Terjadi error. Coba ulang kembali');
            }
        }
        else if($arr_id != null){
            $intArray = array_map('intval',explode(",",$arr_id));
            foreach($intArray as $idx){
                Pertanyaan::findFirst("id_pertanyaan=$idx")->delete();

                $query = "DELETE FROM `terdiri_dari` WHERE `id_pertanyaan`=$idx;";
                $this->db->query($query);
            }
            $this->flashSession->success('Pertanyaan berhasil dihapus');
        }
        $this->dispatcher->forward(['action'=>'show']);
    }
    
    public function showAction()
    {
        $temp = Pertanyaan::find();

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
        $this->view->form = new PertanyaanForm();
    }

    public function searchAction(){
        $cari = $_GET['search'];

        if($cari == null){
            $this->response->redirect('pertanyaan');
        }
        else{
            $query1 = $this->modelsManager->createQuery('SELECT * FROM Pertanyaan WHERE CONCAT(id_pertanyaan,konten_pertanyaan) LIKE "%'.$cari.'%"');
            $temp = $query1->execute();

            if($temp->count() <= 0){
                $this->response->redirect('pertanyaan');
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
            $this->view->form = new PertanyaanForm();
        }
    }
};

?>