<?php

use HelloWorld\Forms\AddCountryForm;
use HelloWorld\Models\Countries;
use Phalcon\Http\Response;

class CountriesController extends ControllerBase {

    public function indexAction()
    {
        $countries = Countries::find();
        $this->view->countries = $countries;
    }

    public function addAction(){
        $form = new AddCountryForm();
        $this->view->form = $form;

        if ($this->request->isPost())
        {
            if ($form->isValid(array_merge($this->request->getPost(), $_FILES)))
            {
                $newCountry = new Countries();
                # $form->bind($this->request->getPost(), $newCountry);
                $name = $this->request->getPost('name');
                $short = $this->request->getPost('short_name');
                $newCountry->name = ucfirst($name);
                $newCountry->short_name = strtoupper($short);
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

    public function DeleteAction($id) {
        $response = new Response();
        $country = Countries::findFirst(
            "id = '{$id}'"
        );
        $country->delete();
        return $this->response->redirect('countries/');
    }
}