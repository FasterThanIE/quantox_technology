<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use InvalidTypeException;

/**
 * @ORM\Entity
 * @ORM\Table(name="grades")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "csm" = "App\Entity\CSM",
 *      "csmb" = "App\Entity\CSMB",
 *      "grade" = "grade"
 * })
 *
 */
class Grade
{
    const MAX_GRADE = 10;
    const MIN_GRADE = 5;

    const CSM_TYPE  = "csm";
    const CSMB_TYPE = "csmb";

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $userId;

    /**
     * @param string $type
     * @throws InvalidTypeException
     */
    public function setType(string $type): void
    {
        if(!$this->isValidType($type))
        {
            throw new InvalidTypeException("Invalid type used. Valid types are ".self::CSM_TYPE." and ".self::CSMB_TYPE);
        }
        $this->type = $type;
    }

    /**
     * @param string $type
     * @return bool
     */
    private function isValidType(string $type)
    {
        return in_array($type, [self::CSM_TYPE, self::CSMB_TYPE]);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }


}