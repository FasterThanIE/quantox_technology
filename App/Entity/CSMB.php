<?php

namespace App\Entity;

use App\Interfaces\Board;
use Doctrine\ORM\Mapping as ORM;
use MinMaxGradeException;

/**
 * @ORM\Entity
 * @ORM\Table(name="csmb")
 */
class CSMB implements Board
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var int
     * @ORM\Column(type="integer", length=2)
     */
    protected $grade;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $userId;

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
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->getUserId();
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        // TODO: Add relation..
    }
}