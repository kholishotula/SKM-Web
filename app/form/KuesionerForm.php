<?php
Namespace App\Forms;

use App\Forms\BaseForm;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Submit;

use Phalcon\Tag;

class KuesionerForm extends BaseForm {
    public function initialize(){
        $kode_verifikasi = new Text ('kode_verifikasi',
        [
            "placeholder" => "Masukkan Kode Verifikasi",
            "class" => "form-control"
        ]);
        $kode_verifikasi->setLabel('Kode Verifikasi');

        $kritik_saran = new TextArea ('kritik_saran',
        [
            "placeholder" => "Masukkan Keterangan",
            "class" => "form-control"
        ]);
        $kritik_saran->setLabel('Keterangan Kuesioner');

        $konten_layanan = new Select ('kategori_layanan', array(
            'LPSE' => 'LPSE',
                            'PPID' => 'PPID',
                            'Persandian' => 'Persandian'),
            array(
                "useEmpty" => true,
                "emptyText" => "Pilih kategori layanan",
                "emptyValue" => "",
                "class" => "form-control",
            )
        );
        $konten_layanan->setLabel('Tambah Kategori Layanan');

        $konten_pertanyaan = new Text ('pilihan_pertanyaan',
        [
            "class" => "typeahead tm-input form-control tm-input-info",
            "data-role" => "tagsinput"
        ]);
        $konten_pertanyaan->setLabel('Tambahkan Pertanyaan');

        $submit = new Submit ('Simpan',[
            'name' => 'Simpan',
            "class" => "btn btn-success"
        ]);

        $this->setUserOptions([
            'method'=> 'POST',
            'class' => 'kuesionerForm'
        ]);

        $this->add($kode_verifikasi);
        $this->add($kritik_saran);
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