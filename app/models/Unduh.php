<?php

use Phalcon\Mvc\Model;

class Unduh extends Model{
    private $id_responden;
    private $id_laporan;

    public function initialize(){
        $this->setSource("mengunduh");
    }

    public function construct($id_responden,$id_laporan){
        $this->id_responden = $id_responden;
        $this->id_laporan = $id_laporan;
    }
}