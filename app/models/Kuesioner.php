<?php

use Phalcon\Mvc\Model;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

class Kuesioner extends Model
{
    private $id_kuesioner;
    private $id_admin;
    private $id_layanan;
    private $keterangan;
    private $kode_verifikasi;
    private $aktif;

    public function initialize(){
        $this->setSource('kuesioner');
    }

    public function construct($id_admin,$id_layanan,$keterangan,$kode_verifikasi,$aktif){
        $this->id_admin = $id_admin;
        $this->id_layanan = $id_layanan;
        $this->keterangan = $keterangan;
        $this->kode_verifikasi = $kode_verifikasi;
        $this->aktif = $aktif;
    }

    public function getId(){
        return $this->id_kuesioner;
    }

    public function getIdLayanan(){
        return $this->id_layanan;
    }

    public function getKode(){
        return $this->kode_verifikasi;
    }

    public function getKeterangan(){
        return $this->keterangan;
    }

    public function getAktif(){
        return $this->aktif;
    }
}