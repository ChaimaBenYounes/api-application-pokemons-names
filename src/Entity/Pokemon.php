<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(attributes={"pagination_enabled"=false})
 * @ORM\Entity(repositoryClass="App\Repository\PokemonRepository")
 */
class Pokemon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Type", inversedBy="pokemon")
     * 
     */
    private $types;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Faiblesse", inversedBy="pokemon")
     */
    private $faiblesses;

    public function __construct()
    {
        $this->faiblesses = new ArrayCollection();
        $this->types = new ArrayCollection();
    }

    
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Type[]
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addTypes(Type $type): self
    {
        if (!$this->types->contains($types)) {
            $this->types[] = $types;
        }

        return $this;
    }

    public function removeType(Type $types): self
    {
        if ($this->types->contains($types)) {
            $this->types->removeElement($types);
        }

        return $this;
    }

    /**
     * @return Collection|Faiblesse[]
     */
    public function getFaiblesses(): Collection
    {
        return $this->faiblesses;
    }

    public function addFaibless(Faiblesse $faibless): self
    {
        if (!$this->faiblesses->contains($faibless)) {
            $this->faiblesses[] = $faibless;
        }

        return $this;
    }

    public function removeFaibless(Faiblesse $faibless): self
    {
        if ($this->faiblesses->contains($faibless)) {
            $this->faiblesses->removeElement($faibless);
        }

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function addType(Type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
        }

        return $this;
    }

    
}
