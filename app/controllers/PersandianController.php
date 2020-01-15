<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

use App\Forms\RespondenForm;
use App\Events\PersandianSecureController;

class PersandianController extends PersandianSecureController
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
            $this->session->set(
                'responden',
                [
                    'id' => $responden->getId(),
                ]
            );
            $this->response->redirect('persandian/kuesioner');
        }
    }

    public function kuesionerAction(){
        $id_pertanyaan = KuesionerPertanyaan::find(
            [
                'columns' => 'id_pertanyaan',
                'conditions' => 'id_kuesioner = 3',
            ]
        );
        
        $id_pertanyaan = implode(',', array_map('intval',(array)$id_pertanyaan));
        $pertanyaan = Pertanyaan::find("id_pertanyaan IN (".$id_pertanyaan.")");
        $this->view->pertanyaan = $pertanyaan;
    }

    public function storeJawabAction(){
        $id_pertanyaan = KuesionerPertanyaan::find(
            [
                'columns' => 'id_pertanyaan',
                'conditions' => 'id_kuesioner = 3',
            ]
        );
        $skor = 0;
        $temp;
        $i = 1;
        foreach ($id_pertanyaan as $temp){
            $skor = $skor + $this->request->getPost('poin' . $i);
            $i++;
        }
        $kritik = $this->request->getPost('kritik');

        $id_responden = $this->session->get('responden')['id'];
        $date = date('Y-M-D', time());
        $submission = new SubmitSurvei();
        $submission->construct($id_responden, '3', $skor, $kritik, $date);

        if($submission->save() == FALSE){
            $this->response->redirect('persandian/kuesioner');
        }
        else{
            $this->response->redirect('persandian/hasil-kuesioner');
        }
    }

    public function hasilKuesionerAction(){
        $skor = SubmitSurvei::find(
            [
                'columns' => 'skor_akhir',
                'conditions' => 'id_responden = ' . $this->session->get('responden')['id'] . ' AND id_kuesioner = 3',
            ]
        );
        $this->view->skor = $skor[0][skor_akhir];
    }
};

?>