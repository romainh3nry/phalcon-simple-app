<?php

$router = $di->getRouter();

// Define your routes here
$router->add(
    '/utilisateur',
    [
        'controller' => 'utilisateur',
        'action' => 'index',
    ]
);

$router->add(
    '/utilisateur/profil/{id}',
    [
        'controller' => 'utilisateur',
        'action' => 'profil',
    ]
);

$router->add(
    '/utilisateur/connexion',
    [
        'controller' => 'utilisateur',
        'action' => 'connexion'
    ]
)->setName('user_connexion');

$router->add(
    '/utilisateur/signup',
    [
        'controller' => 'utilisateur',
        'action' => 'signup'
    ]
);

$router->add(
    '/recherche',
    [
        'controller' => 'recherche',
        'action' => 'index',
    ]
)->setName('search_with_param');

$router->add(
    '/countries',
    [
        'controller' => 'countries',
        'action' => 'index',
    ]
    );

    $router->add(
        '/countries/add',
        [
            'controller' => 'countries',
            'action' => 'add',
        ]
    );

$router->handle();