<?php

namespace HelloWorld\Plugins;

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;

class ModelsPlugin extends Plugin
{
    public function prepareSave($Event, $oEvent, $oModel) {
        $this->logger->debug('saving...');
    }
}