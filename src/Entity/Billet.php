<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BilletRepository")
 */
class Billet
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
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Billeterie", inversedBy="billeterie")
     */
    private $billeterie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Zone", inversedBy="zonne")
     */
    private $zone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="client")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tarif", inversedBy="tarif")
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

    public function getBilleterie(): Billeterie
    {
        return $this->billeterie;
    }

    public function setBilleterie(Billeterie $billeterie): self
    {
        $this->billeterie = $billeterie;

        return $this;
    }

    public function getZone(): Zone
    {
        return $this->zone;
    }

    public function setZone(Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getTarif(): Tarif
    {
        return $this->tarif;
    }

    public function setTarif(Tarif $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }
}
