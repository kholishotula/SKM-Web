<?php
Namespace App\Forms;

use App\Forms\BaseForm;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Submit;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Alnum;

use Phalcon\Tag;

class RespondenForm extends BaseForm {
    public function initialize(){
        $nama = new Text ('nama',
        [
            "placeholder" => "Masukkan nama Anda",
            "class" => "form-control"
        ]);

        $nama->addValidator(new Alnum(
        [
            'message' => 'Nama tidak valid'
        ]));

        $nama_instansi = new Text ('nama_instansi',
        [
            "placeholder" => "Masukkan nama instansi tempat Anda bekerja",
            "class" => "form-control"
        ]);

        $nama_instansi->addValidator(new Alnum(
        [
            'message' => 'Nama instansi tidak valid'
        ]));

        $jabatan = array(
            'name' => 'jabatan'
        );

        $PPK = new Radio("PPK", $jabatan);
        $PPK->setLabel("PPK");
        $Pejabat_pengadaan = new Radio("Pejabat_pengadaan", $jabatan);
        $Pejabat_pengadaan->setLabel("Pejabat Pengadaan");
        $Rekanan = new Radio("Rekanan", $jabatan);
        $Rekanan->setLabel("Rekanan");

        $jenisKel = array(
            'name' => 'jenis_kelamin'
        );

        $Laki = new Radio("Laki", $jenisKel);
        $Laki->setLabel("Laki-laki");
        $Perempuan = new Radio("Perempuan", $jenisKel);
        $Perempuan->setLabel("Perempuan");

        $pendidikan = array(
            'name' => 'pendidikan'
        );

        $SMAK = new Radio("SMAK", $pendidikan);
        $SMAK->setLabel("SMA/SMK");
        $Diploma = new Radio("Diploma", $pendidikan);
        $Diploma->setLabel("Diploma");
        $S1 = new Radio("S1", $pendidikan);
        $S1->setLabel("S1");
        $S23 = new Radio("S23", $pendidikan);
        $S23->setLabel("S2/S3");

        $submit = new Submit ('Next',[
            'name' => 'next',
            "class" => "btn btn-primary"

        ]);
        
        $this->setUserOptions([
            'method'=> 'POST',
            'class' => 'respondenForm'
        ]);
        
        $this->add($nama);
        $this->add($nama_instansi);
        $this->add($PPK);
        $this->add($Pejabat_pengadaan);
        $this->add($Rekanan);
        $this->add($Laki);
        $this->add($Perempuan);
        $this->add($SMAK);
        $this->add($Diploma);
        $this->add($S1);
        $this->add($S23);
        $this->add($submit);
    }
}