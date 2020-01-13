<?php

use Phalcon\Mvc\Model;

class PertanyaanLayanan extends Model{
    private $id_pertanyaan;
    private $id_layanan;

    public function initialize(){
        $this->setSource("memiliki");
    }

    public function construct($id_pertanyaan,$id_layanan){
        $this->id_pertanyaan = $id_pertanyaan;
        $this->id_layanan = $id_layanan;
    }
}