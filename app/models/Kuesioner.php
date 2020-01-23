<?php

use Phalcon\Mvc\Model;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

class Kuesioner extends Model
{
    private $id_kuesioner;
    private $id_admin;
    private $nama_layanan;
    private $keterangan;
    private $kode_verifikasi;

    public function initialize(){
        $this->setSource('kuesioner');
    }

    public function construct($id_admin,$nama_layanan,$keterangan,$kode_verifikasi){
        $this->id_admin = $id_admin;
        $this->nama_layanan = $nama_layanan;
        $this->keterangan = $keterangan;
        $this->kode_verifikasi = $kode_verifikasi;
    }

    public function getId(){
        return $this->id_kuesioner;
    }

    public function getKode(){
        return $this->kode_verifikasi;
    }

    public function getKeterangan(){
        return $this->keterangan;
    }

    public function getKategori(){
        return $this->nama_layanan;
    }
}