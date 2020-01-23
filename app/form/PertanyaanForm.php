<?php
Namespace App\Forms;

use App\Forms\BaseForm;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Submit;

use Phalcon\Tag;

class PertanyaanForm extends BaseForm {
    public function initialize(){
        $konten_pertanyaan = new TextArea ('konten_pertanyaan',
        [
            "placeholder" => "Masukkan Pertanyaan",
            "class" => "form-control"
        ]);
        $konten_pertanyaan->setLabel("Pertanyaan");

        $submit = new Submit ('Simpan',[
            'name' => 'Simpan',
            "class" => "btn btn-success"
        ]);

        $this->setUserOptions([
            'method'=> 'POST',
            'class' => 'pertanyaanForm'
        ]);

        $this->add($konten_pertanyaan);
        $this->add($submit);
    }
}