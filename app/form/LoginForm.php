<?php
Namespace App\Forms;

use App\Forms\BaseForm;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Submit;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Alnum;

use Phalcon\Tag;

class LoginForm extends BaseForm {
    public function initialize(){
        $username = new Text ('username',
        [
            "placeholder" => "Enter Username",
            "class" => "form-control"
        ]);

        $username->addValidator(new Alnum(
        [
            'message' => 'Username hanya terdiri dari huruf dan angka'
        ]));

        $password = new Password ('password',
        [
            "placeholder" => "Enter password",
            "class" => "form-control"

        ]);

        $password->addValidator(new Alnum(
        [
            'message' => 'Password hanya terdiri dari huruf dan angka'
        ]));

        $submit = new Submit ('Login',[
            'name' => 'login',
            "class" => "btn btn-primary"

        ]);
        
        $this->setUserOptions([
            'method'=> 'POST',
            'class' => 'loginForm'
        ]);


        $cek = new Check('remember',
            [
                'value' => 1,
        ]);
        $cek->setLabel('Remember me');
        
        $this->add($username);
        $this->add($password);
        $this->add($cek);
        $this->add($submit);
    }
}