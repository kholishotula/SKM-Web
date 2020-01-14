<?php
Namespace App\Forms;

use App\Forms\BaseForm;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Submit;

use Phalcon\Tag;

// validation
use Phalcon\Validation;
use Phalcon\Validation\Validator\File as FileValidator;
use Phalcon\Validation\Validator\PresenceOf;


class UploadForm extends BaseForm {
    public function initialize(){
        $photo = new File ('photo');
        $photo->addValidator(
            new FileValidator([
                "maxSize"              => "2M",
                "messageSize"          => ":field exceeds the max filesize (:max)",
                "allowedTypes"         => [
                    "image/jpeg",
                    "image/png",
                ],
                "messageType"          => "Allowed file types are :types",
                "maxResolution"        => "800x600",
                "messageMaxResolution" => "Max resolution of :field is :max",
            ])
        );

        $this->add($photo);
        $this->add(new Submit('Save'));
    }
}