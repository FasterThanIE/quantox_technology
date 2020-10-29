<?php

namespace App\Entity;

use App\Interfaces\Board;
use Doctrine\ORM\Mapping as ORM;
use MinMaxGradeException;

/**
 * @ORM\Entity
 * @ORM\Table(name="csmb")
 */
class CSMB extends Grade implements Board
{

    /**
     * @var int
     * @ORM\Column(type="integer", length=2)
     */
    private $grade;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $grade
     * @throws MinMaxGradeException
     */
    public function setGrade(int $grade): void
    {
        if($grade > self::MAX_GRADE || $grade < self::MIN_GRADE)
        {
            throw new MinMaxGradeException("Grade cannot be bellow ".self::MIN_GRADE." or above ".self::MAX_GRADE);
        }
        $this->grade = $grade;
    }

    /**
     * @return int
     */
    public function getGrade(): int
    {
        return $this->grade;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        // TODO: Add relation..
    }
}