<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'stardew-tracker' => 
  array (
    'tablesByName' => 
    array (
      'user' => '\\Map\\UserTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\User' => '\\Map\\UserTableMap',
    ),
  ),
));
