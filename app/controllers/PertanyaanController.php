<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

use App\Forms\PertanyaanForm;

class PertanyaanController extends Controller
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
            $this->error = 'Anda harus log in terlebih dahulu untuk menambahkan data';
            $this->dispatcher->forward(['action' => 'index']);
        }

        if(!$form->isValid($this->request->getPost())){
            foreach($form->getMessages() as $msg){
                $this->messages[$msg->getField()] = $msg;
            }
        }

        if($this->messages['konten_pertanyaan']==null){
            $konten_pertanyaan = $this->request->getPost('konten_pertanyaan');
            $tgl_submit = date('Y-m-d');

            $tanya = new Pertanyaan();
            $tanya->construct($konten_pertanyaan,$tgl_submit);

            if($tanya->save()){
                $this->notif = 'Pertanyaan berhasil ditambahkan';
            }
            else{
                $this->error = 'Terjadi error saat menambahkan. Coba ulangi kembali';
            }
        }

        $this->dispatcher->forward(['action' => 'create']);
    }

    public function editAction()
	{
        if(!$this->request->hasQuery('id_pertanyaan') && !$this->dispatcher ){
            return $this->response->redirect('ubah-pertanyaan');
        }

        $this->view->notif = $this->notif;
        $this->view->error = $this->error;
        $this->view->messages = $this->messages;
        if($this->request->hasQuery('id_pertanyaan'))
            $id_resto = $this->request->getQuery('id_pertanyaan');
       
        else if($this->dispatcher)
            $id_pertanyaan = $this->dispatcher->getParams()['id_pertanyaan'];
        
        $pertanyaan = Pertanyaan::findFirst([
            'conditions' => "id_pertanyaan= '$id_pertanyaan'"
        ]);

        $form = new PertanyaanForm($pertanyaan);
        $this->view->form = $form;
        $this->view->pertanyaan = $pertanyaan;
    }

    public function updateAction(){
        if(!$this->session->has('auth'))
            $this->error = 'Anda harus log in terlebih dahulu untuk memperbarui data';
        
        else if(!$form->isValid($this->request->getPost())){
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
                $pertanyaan->konten_pertanyaan = $this->request->getPost()['konten_pertanyaan'];
                $pertanyaan->tgl_submit = date('Y-m-d');

                if($pertanyaan->update()){
                    $this->notif = 'Data berhasil diperbarui';
                }
                else{
                    $this->error = 'Terjadi kesalahan. Coba ulang kembali';
                }
            }
        }
        $this->dispatcher->forward(['action'=>'edit', 'params'=>['id_pertanyaan'=> $id_pertanyaan]]);
    }
    
    public function deleteAction()
	{
		if(!$this->request->isPost()){
            return $this->response->redirect('pertanyaan');
        }

        $id_pertanyaan = $this->request->getPost('id_pertanyaan');
        if($id_pertanyaan == null){
            $this->error = "Tidak dapat menemukan data. Coba ulang kembali";
        }
        else{
            $pertanyaan = Pertanyaan::findFirst("id_pertanyaan=$id_pertanyaan");
            if($pertanyaan != null){
                if($pertanyaan->delete()){
                    $this->success = "Pertanyaan berhasil dihapus";
                }
                else{
                    $this->error = "Terjadi error. Coba ulang kembali";
                }
            }
            else{
                $this->error = "Tidak dapat menemukan data. Coba ulang kembali";
            }
        }
        $this->dispatcher->forward(['action'=>'show']);
    }
    
    public function showAction()
    {
        $pertanyaan;
        $i=0;
        $temp = Pertanyaan::find();
        foreach($temp as $t){
            $pertanyaan[$i++] = $t;
        }

        $this->view->temp = $pertanyaan;
        $this->view->count = $i;
        $this->view->error = $this->error;
        $this->view->success = $this->succes;
        $this->view->form = new PertanyaanForm();
    }
};

?>