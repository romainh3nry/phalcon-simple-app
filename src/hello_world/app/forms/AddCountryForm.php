<?php

namespace HelloWorld\Forms;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Alpha;
use Phalcon\Validation\Validator\StringLength;


class AddCountryForm extends Form
{
    public function initialize() {

        $name = new Text('name',
            [
                'placeholder' => 'Entrez le nom du pays',
                'class' => 'form-control col-3',
                'required' => 'required',
            ]
        );

        $name -> addValidator(
            new Alpha(
                [
                    'message' => 'Le champ doit contenir uniquement des lettres'
                ]
            )
        );

        $short_name = new Text('short_name',
            [
                'placeholder' => 'Short name',
                'class' => 'form-control col-3 ml-2',
                'required' => 'required',
            ]
        );

        $short_name->addValidators(
            [
                new StringLength(
                    [
                        "max" => 2,
                        "min" => 2,
                        "message" => "Le nom court doit avoir deux lettres",
                        "messageMaximum" => "Le nom court doit comporter deux lettres",
                        "messageMinimum" => "Le nom court doit comporter deux lettres",
        
                    ]
                ),
                new Alpha(
                    [
                        'message' => 'Le nom court doit comporter uniquement des lettres'
                    ]
                )
            ]
        );

        $submit = new Submit('Submit',
            [
                'placeholder' => 'Submit',
                'class' => 'btn btn-success ml-2',
            ]
        );

        $this->add($name);
        $this->add($short_name);
        $this->add($submit);

    }
}