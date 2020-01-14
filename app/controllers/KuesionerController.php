<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

use App\Forms\KuesionerForm;

class KuesionerController extends Controller
{
	public function init(){
        $this->messages = [
			'kode_verifikasi' => '',
			'keterangan_kuesioner' => '',
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

        if($this->messages['keterangan_kuesioner']==null && $this->messages['kode_verifikasi']){
			$keterangan_kuesioner = $this->request->getPost('keterangan_kuesioner');
			$kode_verifikasi = $this->request->getPost('kode_verifikasi');
			$tgl_submit = date('Y-m-d');

            $survei = new Kuesioner();
            $survei->construct($model_kuesioner,$keterangan_kuesioner,$kode_verifikasi,$tgl_submit);

            if($survei->save()){
                $this->notif = 'Kuesioner berhasil ditambahkan';
            }
            else{
                $this->error = 'Terjadi error saat menambahkan. Coba ulangi kembali';
            }
        }

        $this->dispatcher->forward(['action' => 'create']);		
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
        $this->dispatcher->forward(['action'=>'show']);
	}

	public function showAction()
	{
		$kuesioner;
        $i=0;
        $temp = Kuesioner::find();
        foreach($temp as $t){
            $kuesioner[$i++] = $t;
        }

        $this->view->temp = $kuesioner;
        $this->view->count = $i;
        $this->view->error = $this->error;
        $this->view->success = $this->succes;
        $this->view->form = new KuesionerForm();
	}
};