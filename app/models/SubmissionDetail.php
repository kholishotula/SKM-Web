<?php

use Phalcon\Mvc\Model;

class SubmissionDetail extends Model{
    private $id_isi_submit;
    private $id_pertanyaan;
    private $nilai;

    public function initialize(){
        $this->setSource("submission");
    }

    public function construct($id_isi_submit, $id_pertanyaan, $nilai){
        $this->id_isi_submit = $id_isi_submit;
        $this->id_pertanyaan = $id_pertanyaan;
        $this->nilai = $nilai;
    }

    public function getPertanyaan(){
        return $this->id_pertanyaan;
    }

    public function getNilai(){
        return $this->nilai;
    }
}

?>