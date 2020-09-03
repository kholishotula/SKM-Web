<?php

use Phalcon\Mvc\Model;

class SubmitSurvei extends Model{
    private $id_isi_submit;
    private $id_responden;
    private $id_kuesioner;
    private $skor_akhir;
    private $kritik_saran;
    private $tgl_submit;

    public function initialize(){
        $this->setSource("isi_submit");
    }

    public function construct($id_responden,$id_kuesioner,$skor_akhir,$kritik_saran,$tgl_submit){
        $this->id_responden = $id_responden;
        $this->id_kuesioner = $id_kuesioner;
        $this->skor_akhir = $skor_akhir;
        $this->kritik_saran = $kritik_saran;
        $this->tgl_submit = $tgl_submit;
    }

    public function getIdIsiSubmit(){
        return $this->id_isi_submit;
    }

    public function getIdResponden(){
        return $this->id_responden;
    }

    public function getIdKuesioner(){
        return $this->id_kuesioner;
    }

    public function getSkorAkhir(){
        return $this->skor_akhir;
    }

    public function getKritikSaran(){
        return $this->kritik_saran;
    }

    public function getTglSubmit(){
        return $this->tgl_submit;
    }
}