<?php

use Phalcon\Mvc\Model;

class KuesionerPertanyaan extends Model{
    private $id_kuesioner;
    private $id_pertanyaan;

    public function initialize(){
        $this->setSource("terdiri_dari");
    }

    public function construct($id_kuesioner,$id_pertanyaan){
        $this->id_kuesioner = $id_kuesioner;
        $this->id_pertanyaan = $id_pertanyaan;
    }
}