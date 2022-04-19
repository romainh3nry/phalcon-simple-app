<?php

use HelloWorld\Models\Users;
use Phalcon\http\Response;
use HelloWorld\Forms\InscriptionForm;

class UtilisateurController extends ControllerBase {

    public function initialize()
    {
        $this->tag->setTitle('Phalcon is cool');
    }

    public function indexAction() 
    {
        $aUsers = Users::find(
            [
                'cache' => 
                [
                    'key' => 'users-list',
                ],
            ]
        );
        $this->view->users = $aUsers;
        $this->view->count = $aUsers->count();
    }

    public function ConnexionAction()
    {
        if ($this->request->isPost())
        {
            $oResponse = new Response();
            $email = $this->request->getPost('email', email);
            $password = $this->request->getPost('password', special_chars);
            $user = Users::findFirst([
                "email = '{$email}'"
            ]);
            if ($user) {
                if ($user->password === $password) {
                    $oResponse->setJsonContent($user);
                    return $oResponse->send();
                }
                else{
                    $oResponse->setStatusCode(401, 'Authentification failed');
                    $oResponse->setContent('The informations provided are not correct');
                    return $oResponse->send();
                }
            }
            else {
                $this->view->user = 'uknown user';
            }
        }
    }

    public function SignupAction() {
        $user = Users::findFirst([
            "email = 'louise.doe@email.com'"
        ]);
        $form = new InscriptionForm($user);
        $newUser = new Users();
        $this->tag->appendTitle('- signup');

        if ($this->request->isPost())
        {
            if ($form->isValid(array_merge($this->request->getPost(), $_FILES)))
            {
                $form->bind($this->request->getPost(), $user);
                $user->save();
            }
            else
            {
                $aMessages = $form->getMessages();
                $sErreurs = ''; 
                foreach($aMessages as $sMessage)
                {
                    $sErreurs = '- ' . $sMessage . '<br />';
                }
                $this->view->erreurs = $sErreurs;
            }
        }
        $this->view->form = $form;
    }

    public function ProfilAction($id) {
        $user = Users::findFirst([
            "id = {$id}"
        ]);
        $this->view->user = $user;
    }
}