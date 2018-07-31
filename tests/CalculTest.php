<?php

namespace App\Tests;

use App\Entity\Abonnement;
use App\Entity\Billet;
use App\Entity\Billeterie;
use App\Entity\Client;
use App\Entity\Tarif;
use App\Entity\Traitements\Calcul;
use App\Entity\Zone;
use PHPUnit\Framework\TestCase;

class CalculTest extends TestCase {

   
    
    /**
    *
    * @var abonnement
    */
    public $Abonnement;
            
    /**
    *
    * @var Billet
    */
    public $Billet;

    /**
     * @var Billeterie
     */
    public $billeterie;

    /**
     * @var Zone
     */
    public $zone;

    /**
     *
     * @var Client
     */
    public $client;

    /**
     *
     * @var Tarif 
     */
    public $tarif;

    protected function setUp() {
        parent::setUp();

        $this->billet = new Billet();
        $this->tarif = new Tarif();
        $this->calcul = new Calcul();
        $this->billeterie = new Billeterie();
        $this->zone = new Zone();
        $this->client = new Client();
        $this->abonnement = new Abonnement();

        $this->billet->setClient($this->client);
        $this->billet->setZone($this->zone);
        $this->billet->setTarif($this->tarif);
    }

    public function testPleinTarifSansAbo() {
        $this->tarif->setPrix(100);
        $this->zone->setMajoration(20);
        $billet = $this->calcul->generateBillet($this->billet);
        $this->assertEquals(120, $billet->getPrix());
    }
   
    public function testPleinTarifSansAboSansMajoration() {
        $this->tarif->setPrix(100);
        $this->zone->setMajoration(0);
        $billet = $this->calcul->generateBillet($this->billet);
        $this->assertEquals(100, $billet->getPrix());
    }
   
    public function testPleinTarifSansAboAvecReduction() {
        $this->tarif->setPrix(100);
        $this->zone->setMajoration(-20);
        $billet = $this->calcul->generateBillet($this->billet);
        $this->assertEquals(80, $billet->getPrix());
    }
   
}
