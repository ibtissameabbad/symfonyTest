<?php

namespace App\Entity;

use App\Repository\PersonnesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=PersonnesRepository::class)
 */
class Personnes
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
    private $nom;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;
     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sports", mappedBy="personnes" , cascade={"persist"})
     */
    private $sports;
    public function __construct()
    {
        $this->sports = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getNom(): ?string
    {
        return $this->nom;
    }
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }
    /**
     * @return Collection|Sports[]
     */
    public function getSports(): Collection
    {
        return $this->sports;
    }
    public function addSport(\APP\Entity\Sports $sports)
    {
        $this->sports[] = $sports;
        // setting the current user to the $exp,
        // adapt this to whatever you are trying to achieve
        $sports->setPersonnes($this);
        return $this;
    }
    public function removeSport(\App\Entity\Sports $sports)
    {
        $this->sports->removeElement($sports);
    }

    
   
    }
    

