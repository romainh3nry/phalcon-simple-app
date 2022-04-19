<?php

use Phalcon\Filter;

class RechercheController extends ControllerBase {

    public function indexAction() {
        $filter = new Filter();
        if ($this->request->isPost())
        {
            $password = $this->request->getPost('password', special_chars);
            $email = $this->request->getPost('email', email);
            $this->cookies->set('username', $email, time() + 86400);
            $this->cookies->send();
            $this->view->password = $password;
            $this->view->email = $email;
        }
    }
}