<?php

namespace App\Entity;

use App\Repository\RelationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RelationRepository::class)
 */
class Relation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_relation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $weight;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRelation(): ?int
    {
        return $this->id_relation;
    }

    public function setIdRelation(int $id_relation): self
    {
        $this->id_relation = $id_relation;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }
}
