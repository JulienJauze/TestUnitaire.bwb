<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ZoneRepository")
 */
class Zone
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
    private $zone;

    /**
     * @ORM\Column(type="integer")
     */
    private $majoration;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stade", inversedBy="stade")
     */
    private $stade;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Billet", mappedBy="zone")
     */
    private $zonne;

    public function __construct()
    {
        $this->zonne = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getZone(): int
    {
        return $this->zone;
    }

    public function setZone(int $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getMajoration(): int
    {
        return $this->majoration;
    }

    public function setMajoration(int $majoration): self
    {
        $this->majoration = $majoration;

        return $this;
    }

    public function getStade(): Stade
    {
        return $this->stade;
    }

    public function setStade(Stade $stade): self
    {
        $this->stade = $stade;

        return $this;
    }

    /**
     * @return Collection|Billet[]
     */
    public function getZonne(): Collection
    {
        return $this->zonne;
    }

    public function addZonne(Billet $zonne): self
    {
        if (!$this->zonne->contains($zonne)) {
            $this->zonne[] = $zonne;
            $zonne->setZone($this);
        }

        return $this;
    }

    public function removeZonne(Billet $zonne): self
    {
        if ($this->zonne->contains($zonne)) {
            $this->zonne->removeElement($zonne);
            // set the owning side to null (unless already changed)
            if ($zonne->getZone() === $this) {
                $zonne->setZone(null);
            }
        }

        return $this;
    }
}
