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
    private $foto_profil;

    public function initialize(){
        $this->setSource('admin');
    }

    public function construct($nama_admin,$alamat,$jabatan,$jenis_kelamin,$pendidikan_terakhir,$username,$password,$foto_profil){
        $this->nama_admin = $nama_admin;
        $this->alamat = $alamat;
        $this->jabatan = $jabatan;
        $this->jenis_kelamin = $jenis_kelamin;
        $this->pendidikan_terakhir = $pendidikan_terakhir;
        $this->username = $username;
        $this->password = $password;
        $this->foto_profil = $foto_profil;
    }

    public function getId(){
        return $this->id_admin;
    }

    public function getNamaAdmin(){
        return $this->nama_admin;
    }

    public function getAlamat(){
        return $this->alamat;
    }

    public function getJabatan(){
        return $this->jabatan;
    }

    public function getPendidikan(){
        return $this->pendidikan_terakhir;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getFoto(){
        return $this->foto_profil;
    }
}