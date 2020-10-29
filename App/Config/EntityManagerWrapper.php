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
     * @return EntityManager|null
     * @throws ORMException
     */
    public static function getInstance() : ?EntityManager
    {
        if (self::$instance == null)
        {
            $setup = Setup::createAnnotationMetadataConfiguration([$_SERVER['DOCUMENT_ROOT'] . "/App"], true, null, null, false);
            self::$instance = EntityManager::create([
                'dbname' => 'quantox',
                'user' => 'root',
                'password' => '',
                'host' => 'localhost',
                'driver' => 'pdo_mysql',
            ], $setup);
        }

        return self::$instance;
    }
}