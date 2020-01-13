<?php

use Phalcon\Mvc\Model;

class Responden extends Model{
    private $id_responden;
    private $nama_responden;
    private $alamat_asal;
    private $pekerjaan_jabatan;
    private $instansi;
    private $jenis_kelamin;
    private $pendidikan_terakhir;

    public function initialize(){
        $this->setSource("responden");
    }

    public function construct($nama_responden,$alamat_asal,$pekerjaan_jabatan,$instansi,$jenis_kelamin,$pendidikan_terakhir){
        $this->nama_responden = $nama_responden;
        $this->alamat_asal = $alamat_asal;
        $this->pekerjaan_jabatan = $pekerjaan_jabatan;
        $this->instansi = $instansi;
        $this->jenis_kelamin = $jenis_kelamin;
        $this->pendidikan_terakhir = $pendidikan_terakhir;
    }

    public function getId(){
        return $this->id_responden;
    }
}