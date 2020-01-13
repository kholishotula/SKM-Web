<?php

use Phalcon\Mvc\Model;

class Kuesioner extends Model
{
    private $id_kuesioner;
    private $id_admin;
    private $model_kuesioner;
    private $kode_verifikasi;

    public function initialize(){
        $this->setSource('kuesioner');
    }

    public function construct($id_admin,$model_kuesioner,$kode_verifikasi){
        $this->id_admin = $id_admin;
        $this->model_kuesioner = $model_kuesioner;
        $this->kode_verifikasi = $kode_verifikasi;
    }

    public function getId(){
        return $this->id_kuesioner;
    }
}