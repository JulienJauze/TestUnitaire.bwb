<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TarifRepository")
 */
class Tarif
{
    public function __construct()
    {
         $this->tarif = new ArrayCollection();

    } 
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $denomination;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Billet", mappedBy="tarif")
     */
    private $tarif;


    public function getId()
    {
        return $this->id;
    }

    public function getPrix(): int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDenomination(): string
    {
        return $this->denomination;
    }

    public function setDenomination(string $denomination): self
    {
        $this->denomination = $denomination;

        return $this;
    }

    /**
     * @return Collection|Billet[]
     */
    public function getTarif(): Collection
    {
        return $this->tarif;
    }

    public function addTarif(Billet $tarif): self
    {
        if (!$this->tarif->contains($tarif)) {
            $this->tarif[] = $tarif;
            $tarif->setTarif($this);
        }

        return $this;
    }

    public function removeTarif(Billet $tarif): self
    {
        if ($this->tarif->contains($tarif)) {
            $this->tarif->removeElement($tarif);
            // set the owning side to null (unless already changed)
            if ($tarif->getTarif() === $this) {
                $tarif->setTarif(null);
            }
        }

        return $this;
    }
}
