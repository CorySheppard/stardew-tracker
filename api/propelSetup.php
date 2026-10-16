<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require_once './vendor/autoload.php';
require_once './generated-conf/config.php';

$defaultLogger = new Logger('defaultLogger');
$defaultLogger->pushHandler(new StreamHandler('/var/log/propel.log', Logger::WARNING));