<?php

namespace HelloWorld\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\Alnum;


class InscriptionForm extends Form 
{
    public function initialize()
    {
        $oFirstName = new Text('firstname',
            [
                'placeholder' => 'Enter your first name',
                'class' => 'form-control col-6 mt-3',
                'required' => 'required'
            ]
        );
        $oFirstName->addValidator(
            new Alnum(
                [
                    'message' => ucfirst('le prénom doit être uniquement alphanumérique')
                ]
            )
        );

        $oLastName = new Text('lastname',
        [
            'placeholder' => 'Enter your last name',
            'class' => 'form-control col-6 mt-3',
            'required' => 'required'
        ]
    );

        $oEmail = new Email('email',
            [
                'placeholder' => 'Enter your Email',
                'class' => 'form-control col-6 mt-3',
                'required' => 'required'

            ]
        );

        $oPassword = new Password('password',
                [
                    'placeholder' => 'Enter your password',
                    'class' => 'form-control col-6 mt-3',
                    'required' => 'required'
                ]
        );

        $oSubmit = new Submit('Signup',
            [
                'placeholder' => 'Signup',
                'class' => 'btn btn-success col-6 mt-3'
            ]
        );

        $this->add($oFirstName);
        $this->add($oLastName);
        $this->add($oEmail);
        $this->add($oPassword);
        $this->add($oSubmit);
    }
}