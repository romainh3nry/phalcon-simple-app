<?php

use HelloWorld\Models\Users;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->session->set('utilisateur', 'Sebastien');
    }

    public function connexionAction()
    {

    }
}