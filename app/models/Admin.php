<?php

use Phalcon\Mvc\Model;

class Admin extends Model
{
    private $id_admin;
    private $nama_admin;
    private $alamat;
    private $jabatan;
    private $jenis_kelamin;
    private $pendidikan_terakhir;
    private $username;
    private $password;

    public function initialize(){
        $this->setSource('pertanyaan');
    }

    public function construct($nama_admin,$alamat,$jabatan,$jenis_kelamin,$pendidikan_terakhir,$username,$password){
        $this->nama_admin = $nama_admin;
        $this->alamat = $alamat;
        $this->jabatan = $jabatan;
        $this->jenis_kelamin;
        $this->pendidikan_terakhir = $pendidikan_terakhir;
        $this->username = $username;
        $this->password = $password;
    }

    public function getId(){
        return $this->id_admin;
    }

    public function getNamaAdmin(){
        return $this->nama_admin;
    }

    public function getPassword(){
        return $this->password;
    }
}