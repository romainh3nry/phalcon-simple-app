<?php

namespace HelloWorld\Plugins;

use Phalcon\Mvc\User\Plugin;
use Phalcon\Events\Event;
use HelloWorld\Models\Users;
use Phalcon\Dispatcher;
use Phalcon\Acl\Adapter\Memory;
use Phalcon\Acl;
use Phalcon\Acl\Role;


class SecurityPlugin extends Plugin
{
    public function getAcl()
    {
        $oAcl = new Memory();
        $oAcl->setDefaultAction(Acl::DENY);

        $oRoles = [
            'admin' => new Role(
                'admin',
                'Full access au site web'
            ),
            'user' => new Role(
                'user',
                'Accès au site sauf partie Admin'
            )
        ];
        foreach($aRoles as $oRoles)
        {
            $oAcl->addRole($oRoles);
        }
    }

    public function beforeExecuteRoute(Event $oEvent, Dispatcher $oDispatcher)
    {
        $oUtilisateur = null;
        if (true === $this->session->has('utilisateur'))
        {
            $oUtilisateur = $this->session->get('utilisateur');
        }

        $sControleur = $oDispatcher->getControllerName();
        $sAction = $oDispatcher->getActionName();

        if (true === is_null($oUtilisateur))
        {
            if ($sControleur === 'index' && ($sAction === 'connexion' || $sAction === 'index'))
            {
                return true;
            }
            else {
                $oDispatcher->forward(
                    [
                        'controller' => 'index',
                        'action' => 'connexion',
                        'params' => [
                            'erreurs' => 'Pour accéder à la page ' . $sControleur.'/'.$sAction.' vous devez être connecté.'
                        ]
                    ]
                );
                return false;
            }
        }
        if ($oUtilisateur instanceof Users)
        {
            $this->view->utilisateur_connecte = $oUtilisateur;
        }
        else 
        {
            $oDispatcher->forward(
                [
                    'controller' => 'error',
                    'action' => 'code401'
                ]
            );
            return false;
        }
        return true;
    }
}