<?php
Namespace App\Forms;

use App\Forms\BaseForm;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\File;

use Phalcon\Tag;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\Alpha;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\InclusionIn;

class LaporanRekapForm extends BaseForm {
    public function initialize(){
        $judul_laporan = new Text('judul_laporan',
        [
            'placeholder' => 'Masukkan Judul',
            'class' => 'form-control',
        ]);
        $judul_laporan->setLabel('Judul Laporan');
        $judul_laporan->addValidator(new PresenceOf(['message'=>'Judul belum diisi']));

        $tahun_laporan = new Text('tahun_laporan',
        [
            'placeholder' => 'Masukkan Tahun',
            'class' => 'form-control'
        ]);
        $tahun_laporan->setLabel('Tahun Laporan');
        $tahun_laporan->addValidator(new PresenceOf(['message'=>'Tahun belum diisi']));

        $file_laporan = new File('file_laporan',
        [
            'placeholder' => 'Cari File',
            'class' => 'form-control'
        ]);
        $file_laporan->setLabel('Tambah Laporan');
        $file_laporan->addValidator(new PresenceOf(['message'=>'Laporan belum diisi']));

        $submit = new Submit ('Simpan',
        [
            'name' => 'Simpan',
            "class" => "btn btn-success"
        ]);

        $this->setUserOptions([
            'action'=> 'laporanrekap/tambah',
            'class' => 'laporanRekapForm',
            'method'=> 'POST',
            'enctype' => 'multipart/form-data'
        ]);

        $this->add($judul_laporan);
        $this->add($tahun_laporan);
        $this->add($file_laporan);
        $this->add($submit);
    }
}