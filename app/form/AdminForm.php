<?php
Namespace App\Forms;

use App\Forms\BaseForm;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\File;

use Phalcon\Tag;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\Alpha;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\InclusionIn;

class AdminForm extends BaseForm {
    public function initialize(){
        $nama_admin = new Text ('nama_admin',
        [
            "placeholder" => "Masukkan Nama",
            "class" => "form-control"
        ]);
        $nama_admin->setLabel('Nama Lengkap');
        $nama_admin->addValidator(new PresenceOf(['message'=>'Nama belum diisi']));

        $alamat = new Text ('alamat',
        [
            "placeholder" => "Masukkan Alamat",
            "class" => "form-control"
        ]);
        $alamat->setLabel('Alamat');
        $alamat->addValidator(new PresenceOf(['message'=>'Alamat belum diisi']));

        $jabatan = new Text ('jabatan',
        [
            "placeholder" => "Masukkan Jabatan",
            "class" => "form-control"
        ]);
        $jabatan->setLabel('Jabatan');
        $jabatan->addValidator(new PresenceOf(['message'=>'Jabatan belum diisi']));

        $jk_perempuan = new Radio('P',
        [
            'name' => 'jenis_kelamin',
            'value' => 'P'
        ]);
        $jk_perempuan->setLabel('Perempuan');

        $jk_laki = new Radio('L',
        [
            'name' => 'jenis_kelamin',
            'value' => 'L'
        ]);
        $jk_laki->setLabel('Laki-laki');

        $pen_sma = new Radio('SMA',
        [
            'name' => 'pendidikan_terakhir',
            'value' => 'SMA'
        ]);
        $pen_sma->setLabel('SMA');

        $pen_diploma = new Radio('D1/D3/D4',
        [
            'name' => 'pendidikan_terakhir',
            'value' => 'D1/D3/D4'
        ]);
        $pen_diploma->setLabel('D1/D3/D4');

        $pen_undergraduate = new Radio('S1',
        [
            'name' => 'pendidikan_terakhir',
            'value' => 'S1'
        ]);
        $pen_undergraduate->setLabel('S1');

        $pen_postgraduate = new Radio('S2/S3',
        [
            'name' => 'pendidikan_terakhir',
            'value' => 'S2/S3'
        ]);
        $pen_postgraduate->setLabel('S2/S3');

        $username = new Text('username',
        [
            "placeholder" => "Masukkan Username",
            "class" => "form-control"
        ]);
        $username->setLabel('Username');
        $username->addValidator(new PresenceOf(['message'=>'Username belum diisi']));

        $password = new Password('password',
        [
            "placeholder" => "Masukkan Password",
            "class" => "form-control"
        ]);
        $password->setLabel('Password');
        $password->addValidators(
            [
                new PresenceOf(["message" => "Password required"]),
                new Regex(
                    [
                        'pattern'=>"/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
                        'message'=>'Password minimum terdiri dari 8 karakter, paling sedikit satu huruf dan satu angka' 
                    ]
                ),
            ]
        );

        $foto_profil = new File('foto_profil',
        [
            'placeholder' => 'Cari Gambar',
            'class' => 'form-control'
        ]);
        $foto_profil->setLabel('Tambah Foto');
        $foto_profil->addValidator(new PresenceOf(['message'=>'Foto belum diisi']));

        $submit = new Submit ('Simpan',
        [
            'name' => 'Simpan',
            "class" => "btn btn-success"
        ]);

        $this->setUserOptions([
            'action'=> 'tambah/operator',
            'class' => 'adminForm',
            'method'=> 'POST',
            'enctype' => 'multipart/form-data'
        ]);

        $this->add($nama_admin);
        $this->add($alamat);
        $this->add($jabatan);
        $this->add($jk_perempuan);
        $this->add($jk_laki);
        $this->add($pen_sma);
        $this->add($pen_diploma);
        $this->add($pen_undergraduate);
        $this->add($pen_postgraduate);
        $this->add($username);
        $this->add($password);
        $this->add($foto_profil);
        $this->add($submit);
    }
}