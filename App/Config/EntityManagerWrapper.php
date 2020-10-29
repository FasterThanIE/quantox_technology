<?php

namespace App\Config;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;

/**
 * TODO: Fix this dirty code... :(
 */
class EntityManagerWrapper
{

    /**
     * @var EntityManagerWrapper|null
     */
    private static $instance = null;

    /**
     * @var string[]
     */
    private $config = [
        'dbname' => 'quantox',
        'user' => 'root',
        'password' => '',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
    ];

    /**
     * EntityManagerWrapper constructor.
     * @throws ORMException
     */
    private function __construct()
    {
        $setup = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/App"), true, null, null, false);
        return EntityManager::create($this->config, $setup);
    }

    /**
     * @return EntityManagerWrapper|null
     */
    public static function getInstance() : ?EntityManagerWrapper
    {
        if (self::$instance == null)
        {
            self::$instance = new EntityManagerWrapper();
        }

        return self::$instance;
    }
}