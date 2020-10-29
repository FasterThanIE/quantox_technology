<?php

namespace App\Entity;

use App\Interfaces\Board;
use Doctrine\ORM\Mapping as ORM;
use MinMaxGradeException;

/**
 * @ORM\Entity
 * @ORM\Table(name="csm")
 */
class CSM extends Grade
{
    /**
     * @var int
     * @ORM\Column(type="integer", length=2)
     */
    private $grade;

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
}