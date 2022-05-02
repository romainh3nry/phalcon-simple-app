<?php

namespace HelloWorld\Forms;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Submit;


class AddMovieForm extends Form
{
    public function initialize()
    {
        $title = new Text('title',
            [
                'placeholder' => 'title',
                'required' => 'required',
                'class' => 'form-control m-2',
            ]
        );

        $year = new Text('year',
            [
                'placeHolder' => 'year',
                'required' => 'required',
                'class' => 'form-control m-2',
            ]
        );

        $director = new Text('director',
            [
                'placeHolder' => 'director',
                'required' => 'required',
                'class' => 'form-control m-2',
            ]
        );

        $plot = new TextArea('plot',
            [
                'placeHolder' => 'plot',
                'required' => 'required',
                'class' => 'form-control m-2',
            ]
        );

        $country = new Text('country',
            [
                'placeHolder' => 'country',
                'required' => 'required',
                'class' => 'form-control m-2',
            ]
        );

        $submit = new Submit('Ajouter',
            [
                'class' => 'btn btn-success form-control m-2'
            ]
        );

        $this->add($title);
        $this->add($year);
        $this->add($country);
        $this->add($director);
        $this->add($plot);
        $this->add($submit);

    }
}