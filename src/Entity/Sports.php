<?php

namespace App\Entity;

use App\Repository\SportsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Entity(repositoryClass=SportsRepository::class)
 */
class Sports
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnes", inversedBy="sports")
     */
    private $personnes;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getType(): ?string 
    {
         return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
   
    public function getPersonnes(): ?Personnes
    {
        return $this->personnes;
    }
    public function setPersonnes(?Personnes $personnes): self
    {
        $this->personnes = $personnes;

        return $this;
    }
}
