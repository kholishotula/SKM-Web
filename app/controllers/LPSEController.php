<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

use App\Forms\RespondenForm;
use App\Events\LPSESecureController;

class LPSEController extends LPSESecureController
{
    public function initialize(){
        $this->messages = '';
    }
    
	public function lpseAction(){
		$this->response->redirect('lpse/data-responden');
    }
    
    public function respondenAction(){
        $id_kues = Kuesioner::find(
            [
                'columns' => 'id_kuesioner',
                'conditions' => 'id_layanan = 1 AND aktif = 1'
            ]
        );
        
        if($id_kues->count() == null){
            $this->response->redirect('survei/error');
        }

        $this->view->form = new RespondenForm();

    }

    public function storeRespondAction(){
        if(!$this->request->isPost())
            $this->response->redirect('lpse/data-responden');

        $form = new RespondenForm();

        if(!$form->isValid($this->request->getPost())){
            foreach($form->getMessages() as $msg){
                if($msg == 'Harap isi bidang asal kota' || $msg == 'Harap isi bidang pekerjaan')
                    continue;
                $this->messages = $msg;
                $this->flashSession->error($msg);
            }
            if($this->messages != NULL)
                return $this->response->redirect('lpse/data-responden');
        }
        $nama = $this->request->getPost('nama');
        $nama_instansi = $this->request->getPost('nama_instansi');
        $jabatan = $this->request->getPost('jabatan');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $pendidikan = $this->request->getPost('pendidikan');

        $responden = new Responden();

        $responden->construct($nama, '', $jabatan, $nama_instansi, $jenis_kelamin, $pendidikan);
        if($responden->save() == FALSE){
            $this->response->redirect('lpse/data-responden');
        }
        else{
            $this->session->set(
                'responden',
                [
                    'id' => $responden->getId(),
                ]
            );
            $this->response->redirect('lpse/kuesioner');
        }
    }

    public function kuesionerAction(){
        $id_kues = Kuesioner::find(
            [
                'columns' => 'id_kuesioner',
                'conditions' => 'id_layanan = 1 AND aktif = 1'
            ]
        );
        
        if($id_kues->count() == null){
            $this->response->redirect('survei/error');
        }

        $id_kues = $id_kues[0][id_kuesioner];

        $id = KuesionerPertanyaan::find(
            [
                'columns' => 'id_pertanyaan',
                'conditions' => 'id_kuesioner = ' . $id_kues,
            ]
        );
        $temp;
        $ids = array();
        $i = 0;
        foreach ($id as $temp){
            array_push($ids, $id[$i][id_pertanyaan]);
            $i++;
        }
        $ids = implode(',', $ids);

        $pertanyaan = Pertanyaan::find("id_pertanyaan IN (".$ids.")");
        $this->view->pertanyaan = $pertanyaan;
    }

    public function storeJawabAction(){
        $kritik = $this->request->getPost('kritik');
        if($kritik == null){
            $this->flashSession->error('Harap isi kritik dan saran');
        }
        $id_kues = Kuesioner::find(
            [
                'columns' => 'id_kuesioner',
                'conditions' => 'id_layanan = 1 AND aktif = 1'
            ]
        );
        $id_kues = $id_kues[0][id_kuesioner];
        $id_pertanyaan = KuesionerPertanyaan::find(
            [
                'columns' => 'id_pertanyaan',
                'conditions' => 'id_kuesioner = ' . $id_kues,
            ]
        );
        $skor = 0;
        $temp;
        $i = 1;
        foreach ($id_pertanyaan as $temp){
            if($this->request->getPost('poin' . $i) == null){
                $this->flashSession->error('Harap isi semua pertanyaan');
                return $this->response->redirect('lpse/kuesioner');
            }
            $skor = $skor + $this->request->getPost('poin' . $i);
            $i++;
        }
        $skor = ($skor/(count($id_pertanyaan)*4))*100;

        $id_responden = $this->session->get('responden')['id'];
        $date = date('Y-m-d');
        $submission = new SubmitSurvei();
        $submission->construct($id_responden, $id_kues, $skor, $kritik, $date);

        if($submission->save() == FALSE){
            $this->response->redirect('lpse/kuesioner');
        }
        else{
            $i = 1;
            $id_isi_submit = $submission->getIdIsiSubmit();
            foreach($id_pertanyaan as $temp){
                $nilai = $this->request->getPost('poin' . $i);
                $submissionDetail = new SubmissionDetail();
                $id_tanya = $id_pertanyaan[$i-1][id_pertanyaan];
                $submissionDetail->construct($id_isi_submit, $id_tanya, $nilai);
                if($submissionDetail->save()){
                    $i++;
                }
            }
            $this->response->redirect('lpse/hasil-kuesioner');
        }
    }

    public function hasilKuesionerAction(){
        $id_kues = Kuesioner::find(
            [
                'columns' => 'id_kuesioner',
                'conditions' => 'id_layanan = 1 AND aktif = 1'
            ]
        );
        $id_kues = $id_kues[0][id_kuesioner];
        $skor = SubmitSurvei::find(
            [
                'columns' => 'skor_akhir',
                'conditions' => 'id_responden = ' . $this->session->get('responden')['id'] . ' AND id_kuesioner = ' . $id_kues,
            ]
        );
        $this->view->skor = $skor[0][skor_akhir];
    }
};

?>