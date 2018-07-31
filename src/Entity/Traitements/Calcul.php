<?php

namespace App\Entity\Traitements;

use App\Entity\Billet;

class Calcul {


    public function generateBillet(Billet $billet) {
        $base = $billet->getTarif()->getPrix();
        $prix = $base + ($base * $billet->getZone()->getMajoration()/100);
        $billet->setPrix($prix);
        return $billet;
    }

}
