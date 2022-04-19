<?php

namespace HelloWorld\Forms;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Alpha;


class AddCountryForm extends Form
{
    public function initialize() {

        $name = new Text('name',
            [
                'placeholder' => 'Entrez le nom du pays',
                'class' => 'form-control col-4',
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

        $submit = new Submit('Submit',
            [
                'placeholder' => 'Submit',
                'class' => 'btn btn-success ml-2',
            ]
        );

        $this->add($name);
        $this->add($submit);

    }
}