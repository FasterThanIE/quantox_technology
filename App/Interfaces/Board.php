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

}