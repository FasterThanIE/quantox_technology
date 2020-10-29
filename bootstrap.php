<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/App"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

//$conn = array(
//    'driver' => 'pdo_sql',
//    'path' => __DIR__ . '/db.sqlite',
//);

$conn = array(
    'dbname' => 'quantox',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);

// obtaining the Entity manager
$entityManager = EntityManager::create($conn, $config);