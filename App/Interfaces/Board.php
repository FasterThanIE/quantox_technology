<?php

namespace App\Interfaces;

use App\Entity\User;

interface Board
{

    /**
     * @return int
     */
    public function getId() : int;

    /**
     * @param int $grade
     */
    public function setGrade(int $grade) : void;

    /**
     * @return int
     */
    public function getGrade() : int;

    /**
     * @param int $userId
     */
    public function setUserId(int $userId) : void;

    /**
     * @return int
     */
    public function getUserId() : int;

    /**
     * @return User
     */
    public function getUser() : User;

}