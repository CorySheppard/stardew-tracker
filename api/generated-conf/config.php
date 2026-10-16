<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion(2);
$serviceContainer->setAdapterClass('stardew-tracker', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle('stardew-tracker');
$manager->setConfiguration(array (
  'classname' => 'Propel\\Runtime\\Connection\\ConnectionWrapper',
  'dsn' => 'mysql:host=localhost;dbname=stardew-tracker',
  'user' => 'root',
  'password' => '',
  'settings' =>
  array (
    'charset' => 'utf8mb4',
    'queries' =>
    array (
      'utf8' => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci, COLLATION_CONNECTION = utf8mb4_unicode_ci, COLLATION_DATABASE = utf8mb4_unicode_ci, COLLATION_SERVER = utf8mb4_unicode_ci',
    ),
  ),
  'model_paths' =>
  array (
    0 => 'src',
    1 => 'vendor',
  ),
));
$serviceContainer->setConnectionManager($manager);
$serviceContainer->setDefaultDatasource('stardew-tracker');
require_once __DIR__ . '\./loadDatabase.php';
