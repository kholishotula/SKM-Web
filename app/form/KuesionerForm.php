<?php
Namespace App\Forms;

use App\Forms\BaseForm;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Submit;

use Phalcon\Models\Pertanyaan;
use Phalcon\Models\Layanan;

use Phalcon\Tag;

class KuesionerForm extends BaseForm {
    public function initialize(){

        $kode_verifikasi = new Text ('kode_verifikasi',
        [
            "placeholder" => "Masukkan Kode Verifikasi",
            "class" => "form-control"
        ]);
        $kode_verifikasi->setLabel('Kode Verifikasi');

        $keterangan_kuesioner = new TextArea ('keterangan_kuesioner',
        [
            "placeholder" => "Masukkan Keterangan",
            "class" => "form-control"
        ]);
        $keterangan_kuesioner->setLabel('Keterangan Kuesioner');

        $konten_pertanyaan = new Text ('fk_pertanyaan',
        [
            "class" => "typeahead tm-input form-control tm-input-info"
        ]);
        $konten_pertanyaan->setLabel('Tambahkan Pertanyaan');

        $konten_layanan = new Text ('fk_layanan',
        [
            "class" => "typeahead tm-input form-control tm-input-info"
        ]);
        $konten_layanan->setLabel('Tambahkan Kategori Layanan');

        $submit = new Submit ('Simpan',[
            'name' => 'Simpan',
            "class" => "btn btn-success"
        ]);

        $this->setUserOptions([
            'method'=> 'POST',
            'class' => 'kuesionerForm'
        ]);

        $this->add($kode_verifikasi);
        $this->add($keterangan_kuesioner);
        $this->add($konten_layanan);
        $this->add($konten_pertanyaan);
        $this->add($submit);
    }
}



        // $konten_pertanyaan = new Select('fk_pertanyaan', $data_tanya,
        // [
        //     "using"     => ['id_pertanyaan', 'konten_pertanyaan'],
        //     "useEmpty"  => true,
        //     "emptyText" => "Pilih",
        // ]);

        // $konten_layanan = new Select('fk_layanan',$data_layanana,
        // [
        //     "using"     => ['id_layanan', 'nama_layanan'],    
        //     "useEmpty"  => true,
        //     "emptyText" => "Pilih",
        // ]);