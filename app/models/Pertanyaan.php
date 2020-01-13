<?php

use Phalcon\Mvc\Model;

class Pertanyaan extends Model
{
    private $id_pertanyaan;
    private $konten_pertanyaan;

    public function initialize(){
        $this->setSource("pertanyaan");
    }

    public function construct($konten_pertanyaan){
        $this->konten_pertanyaan = $konten_pertanyaan;
    }

    public function getId(){
        return $this->id_pertanyaan;
    }

    public function getKonten(){
        return $this->konten_pertanyaan;
    }
}