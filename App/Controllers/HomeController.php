<?php

namespace App\Controllers;

use App\Config\EntityManagerWrapper;
use App\Entity\CSM;
use App\Entity\CSMB;
use App\Entity\Grade;
use App\Entity\User;
use App\Models\OutputModel;
use Doctrine\ORM\ORMException;

class HomeController
{

    /**
     * @param int $userId
     * @throws ORMException
     */
    public static function handleGrade(int $userId) : void
    {
        $response = [];

        $em = EntityManagerWrapper::getInstance();

        $user = $em->getRepository(User::class)->findOneBy(['id' => $userId]);

        if($user->getGrades())
        {
            $response = new OutputModel($user);
        }

        echo json_encode($response);

    }


}