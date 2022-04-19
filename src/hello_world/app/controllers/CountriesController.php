<?php

use HelloWorld\Forms\AddCountryForm;
use HelloWorld\Models\Countries;

class CountriesController extends ControllerBase {

    public function indexAction()
    {

    }

    public function addAction(){
        $form = new AddCountryForm();
        $this->view->form = $form;

        if ($this->request->isPost())
        {
            if ($form->isValid(array_merge($this->request->getPost(), $_FILES)))
            {
                $newCountry = new Countries();
                $form->bind($this->request->getPost(), $newCountry);
                $newCountry->save();
            }
            else {
                $aMessages = $form->getMessages();
                $sErreurs = '';
                foreach($aMessages as $sMessage)
                {
                    $sErreurs = '- ' . $sMessage . '<br />';
                }
                $this->view->erreurs = $sErreurs;
            };
        }
    }
}