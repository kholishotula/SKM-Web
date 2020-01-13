<?php

use Phalcon\Mvc\Model;

class LaporanRekapitulasi extends Model
{
    private $id_laporan;
    private $tahun_laporan;
    private $tgl_upload;
    private $file_laporan;

    public function initialize(){
        $this->setSource('laporan_rekapitulasi');
    }

    public function construct($tahun_laporan,$tgl_upload,$file_laporan){
        $this->tahun_laporan = $tahun_laporan;
        $this->tgl_upload= $tgl_upload;
        $this->file_laporan = $file_laporan;
    }

    public function getId(){
        return $this->id_laporan;
    }

    public function getTahunLapor(){
        return $this->tahun_laporan;
    }

    public function getFile(){
        return $this->file_laporan;
    }
}