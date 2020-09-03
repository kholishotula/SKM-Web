<?php
Namespace App\Forms;

use App\Forms\BaseForm;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Submit;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;

use Phalcon\Tag;

class RespondenForm extends BaseForm {
    public function initialize(){
        $nama = new Text ('nama',
        [
            "placeholder" => "Masukkan nama Anda",
            "class" => "form-control"
        ]);

        $nama->addValidator(new PresenceOf(
        [
            'message' => 'Harap isi bidang nama'
        ]));

        $Kota = new Radio("Kota", array('name' => 'asal', 'value' => 'Kota Blitar'));
        $Kota->setLabel("Kota Blitar");
        $LuarKota = new Radio("LuarKota", array('name' => 'asal', 'value' => 'Luar'));
        $LuarKota->setLabel("Luar Kota Blitar");
        $tulisKota = new Text ('tulisKota', [
            'placeholder' => 'Jika luar kota, sebutkan :',
        ]);

        $tulisKota->addValidator(new PresenceOf(
        [
            'message' => 'Harap isi bidang asal kota'
        ]));

        $pekerjaan = new Text ('pekerjaan',
        [
            "placeholder" => "Masukkan pekerjaan Anda",
            "class" => "form-control"
        ]);

        $pekerjaan->addValidator(new PresenceOf(
        [
            'message' => 'Harap isi bidang pekerjaan'
        ]));

        $nama_instansi = new Text ('nama_instansi',
        [
            "placeholder" => "Masukkan nama instansi tempat Anda bekerja",
            "class" => "form-control"
        ]);

        $nama_instansi->addValidator(new PresenceOf(
        [
            'message' => 'Harap isi bidang nama instansi'
        ]));

        $PPK = new Radio("PPK", array('name' => 'jabatan', 'value' => 'PPK'));
        $PPK->setLabel("PPK");
        $Pejabat_pengadaan = new Radio("Pejabat_pengadaan", array('name' => 'jabatan', 'value' => 'Pejabat Pengadaan'));
        $Pejabat_pengadaan->setLabel("Pejabat Pengadaan");
        $Rekanan = new Radio("Rekanan", array('name' => 'jabatan', 'value' => 'PPK'));
        $Rekanan->setLabel("Rekanan");

        $Laki = new Radio("Laki", array('name' => 'jenis_kelamin', 'value' => 'L'));
        $Laki->setLabel("Laki-laki");
        $Perempuan = new Radio("Perempuan", array('name' => 'jenis_kelamin', 'value' => 'P'));
        $Perempuan->setLabel("Perempuan");

        $SMAK = new Radio("SMAK", array('name' => 'pendidikan', 'value' => 'SMA/SMK'));
        $SMAK->setLabel("SMA/SMK");
        $Diploma = new Radio("Diploma", array('name' => 'pendidikan', 'value' => 'Diploma'));
        $Diploma->setLabel("Diploma");
        $S1 = new Radio("S1", array('name' => 'pendidikan', 'value' => 'S1'));
        $S1->setLabel("S1");
        $S23 = new Radio("S23", array('name' => 'pendidikan', 'value' => 'S2/S3'));
        $S23->setLabel("S2/S3");

        $submit = new Submit ('Lanjut',[
            'name' => 'lanjut',
            "class" => "btn btn-primary"
        ]);
        
        $this->setUserOptions([
            'method'=> 'POST',
            'class' => 'respondenForm'
        ]);
        
        $this->add($nama);
        $this->add($Kota);
        $this->add($LuarKota);
        $this->add($tulisKota);
        $this->add($pekerjaan);
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