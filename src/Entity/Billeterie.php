<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BilleterieRepository")
 */
class Billeterie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $place_vendu;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Billet", mappedBy="billeterie")
     */
    private $billeterie;

    public function __construct()
    {
        $this->billeterie = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPlaceVendu(): int
    {
        return $this->place_vendu;
    }

    public function setPlaceVendu(int $place_vendu): self
    {
        $this->place_vendu = $place_vendu;

        return $this;
    }

    /**
     * @return Collection|Billet[]
     */
    public function getBilleterie(): Collection
    {
        return $this->billeterie;
    }

    public function addBilleterie(Billet $billeterie): self
    {
        if (!$this->billeterie->contains($billeterie)) {
            $this->billeterie[] = $billeterie;
            $billeterie->setBilleterie($this);
        }

        return $this;
    }

    public function removeBilleterie(Billet $billeterie): self
    {
        if ($this->billeterie->contains($billeterie)) {
            $this->billeterie->removeElement($billeterie);
            // set the owning side to null (unless already changed)
            if ($billeterie->getBilleterie() === $this) {
                $billeterie->setBilleterie(null);
            }
        }

        return $this;
    }
}
