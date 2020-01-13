<?php

use Phalcon\Mvc\Model;

class Layanan extends Model{
    private $id_layanan;
    private $nama_layanan;

    public function initialize(){
        $this->setSource("layanan");
    }

    public function construct($nama_layanan){
        $this->nama_layanan = $nama_layanan;
    }

    public function getId(){
        return $this->id_layanan;
    }
}