<?php

use Phalcon\Mvc\Router;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Crypt;
use Phalcon\Session\Factory;
use Phalcon\Cache\Frontend\Factory as FFactory;
use Phalcon\Cache\Backend\Factory as BFactory;
use Phalcon\Mvc\Model\Manager as ModelsManager;
use Phalcon\Events\Manager as EventsManager;
use HelloWorld\Plugins\ModelsPlugin;

/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new View();
    $view->setDI($this);
    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines([
        '.volt' => function ($view) {
            $config = $this->getConfig();

            $volt = new VoltEngine($view, $this);

            $volt->setOptions([
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ]);

            $compiler = $volt->getCompiler();
            $compiler->addFunction('v_explode', 'explode');

            return $volt;
        },
        '.phtml' => PhpEngine::class

    ]);

    return $view;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () {
    $config = $this->getConfig();

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $params = [
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
    ];

    if ($config->database->adapter == 'Postgresql') {
        unset($params['charset']);
    }

    $connection = new $class($params);

    return $connection;
});


/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $oOptions = [
        'uniqueId'      => 'hello-world',
        'host'          => 'db_session_redis',
        'auth'          => 'Azerty',
        'port'          => 6379,
        'persistent'    => true,
        'lifetime'      => 3600,
        'prefix'        => 'app_',
        'adapter'       => 'redis',

    ];
    $oSession = Factory::load($oOptions);
    $oSession->start();

    return $oSession;
});

/**
 * Register router
 */
$di->setShared('router', function () {
    $router = new Router();
    $router->setUriSource(
        Router::URI_SOURCE_SERVER_REQUEST_URI
    );

    return $router;
});

$di->set(
    'crypt',
    function() {
        $crypt = new Crypt();
        $crypt->setCipher('aes-256-ctr');
        $key = "eK-R?'$-[GAnCdWY=El/YO`.cX9A*_0nY*9$6Dab@.H?WohjeD0Qs<V:0bf|U";
        $crypt->setKey($key);
        return $crypt;
    }
);

$di->set('modelsCache', function() {
    $aOptions = [
        'lifetime' => 172800,
        'adapter' => 'data',
    ];
    $oFrontCache = FFactory::load($aOptions);

    $aOptions = [
        'cacheDir' => '../cache/model/',
        'frontend' => $oFrontCache,
        'adapter' => 'file',
    ];

    $oBackCache = BFactory::load($aOptions);

    return $oBackCache;
});

$di->setShared('modelsManager', function() {
    $oModele = new ModelsManager();
    $oGestionEvenements = new EventsManager;
    $oGestionEvenements->attach('model', new ModelsPlugin());
    $oModele->setEventsManager($oGestionEvenements);

    return $oModele;
});

$di->setShared('logger', function(){
    $oLogger = new \Phalcon\Logger\Adapter\Stream('php://stderr');
    
    return $oLogger;
});