<?php

use Phalcon\Mvc\Model;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;

class Kuesioner extends Model
{
    private $id_kuesioner;
    private $id_admin;
    private $model_kuesioner;
    private $kode_verifikasi;
    private $kritik_saran;
    private $kategori_layanan;

    public function initialize(){
        $this->setSource('kuesioner');
    }

    public function construct($id_admin,$model_kuesioner,$kritik_saran,$kode_verifikasi,$kategori_layanan){
        $this->id_admin = $id_admin;
        $this->model_kuesioner = $model_kuesioner;
        $this->kritik_saran = $kritik_saran;
        $this->kode_verifikasi = $kode_verifikasi;
        $this->kategori_layanan = $kategori_layanan;
    }

    public function getId(){
        return $this->id_kuesioner;
    }

    public function getKode(){
        return $this->kode_verifikasi;
    }

    public function getKritikSaran(){
        return $this->kritik_saran;
    }

    public function getKategori(){
        return $this->kategori_layanan;
    }

    // public function getList($params){
    //     $sort = $params['sort'] ?: 'k.id_kuesioner';
    //     $order = $params['order'] ?: 'ASC';
    //     $page = (int) ($params['page'] ?: 1);
    //     $limit = $params['limit'] ?: 2;

    //     $builder = Phalcon\Di::getDefault()
    //         ->getModelsManager()
    //         ->createBuilder()
    //         ->from(array('k' => 'Phalcon\Models\Kuesioner'))
    //         ->orderBy("$sort $order");

    //     $paginator = new PaginatorQueryBuilder(array(
    //         'builder' => $builder,
    //         'limit' => $limit,
    //         'page' => $page
    //     ));
    //     return $paginator;
    // }
}