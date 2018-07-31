<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StadeRepository")
 */
class Stade
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
    private $nombre_place;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Zone", mappedBy="stade")
     */
    private $stade;

    public function __construct()
    {
        $this->stade = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombrePlace(): int
    {
        return $this->nombre_place;
    }

    public function setNombrePlace(int $nombre_place): self
    {
        $this->nombre_place = $nombre_place;

        return $this;
    }

    /**
     * @return Collection|Zone[]
     */
    public function getStade(): Collection
    {
        return $this->stade;
    }

    public function addStade(Zone $stade): self
    {
        if (!$this->stade->contains($stade)) {
            $this->stade[] = $stade;
            $stade->setStade($this);
        }

        return $this;
    }

    public function removeStade(Zone $stade): self
    {
        if ($this->stade->contains($stade)) {
            $this->stade->removeElement($stade);
            // set the owning side to null (unless already changed)
            if ($stade->getStade() === $this) {
                $stade->setStade(null);
            }
        }

        return $this;
    }
}
