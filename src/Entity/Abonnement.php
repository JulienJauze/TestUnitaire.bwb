<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AbonnementRepository")
 */
class Abonnement
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
    private $montant;

    /**
     * @ORM\Column(type="integer")
     */
    private $reduction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Client", mappedBy="abonnement")
     */
    private $abonnement;

    public function __construct()
    {
        $this->abonnement = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMontant(): int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getReduction(): int
    {
        return $this->reduction;
    }

    public function setReduction(int $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getDesignation(): string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getAbonnement(): Collection
    {
        return $this->abonnement;
    }

    public function addAbonnement(Client $abonnement): self
    {
        if (!$this->abonnement->contains($abonnement)) {
            $this->abonnement[] = $abonnement;
            $abonnement->setAbonnement($this);
        }

        return $this;
    }

    public function removeAbonnement(Client $abonnement): self
    {
        if ($this->abonnement->contains($abonnement)) {
            $this->abonnement->removeElement($abonnement);
            // set the owning side to null (unless already changed)
            if ($abonnement->getAbonnement() === $this) {
                $abonnement->setAbonnement(null);
            }
        }

        return $this;
    }
}
