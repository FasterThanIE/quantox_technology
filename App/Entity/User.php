<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
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
     * @var string
     * @ORM\Column(type="string", length=64)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=4)
     */
    protected $type;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }


    /**
     * @param string $type
     * @throws \InvalidTypeException
     */
    public function setType(string $type): void
    {
        if(!$this->isValidType($type))
        {
            throw new \InvalidTypeException("Invalid type used. Valid types are ".self::CSM_TYPE." and ".self::CSMB_TYPE);
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
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}