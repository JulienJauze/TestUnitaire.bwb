<?php

namespace App\DataFixtures;

use App\Entity\Billeterie;
use App\Entity\Client;
use App\Entity\Role;
use App\Entity\Stade;
use App\Entity\Tarif;
use App\Entity\Zone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->generateStade($manager);
        $this->generateRole($manager);
        $this->generateClient($manager);
        $this->generateZone($manager);
        $this->generateBilleterie($manager);
        $this->generateTarif($manager);
        $manager->flush();
    }
    
     public function generateStade($em){
        
        $nombre_place = 50000;
        $stade = new Stade;
        $stade->setNombrePlace($nombre_place);
        $em->persist($stade);
        $em->flush();
    }
    public function generateRole($em){
        
        $em->persist(new Role('client'));
        $em->persist(new Role('etudiant'));
        $em->persist(new Role('enfant'));
        $em->flush();
    }
    
    public function generateClient($em){
        for($i=0;$i<1000;$i++){
        $client = new Client;
        $client->setNom('nom'.$i);
        $client->setPrenom('prenom'.$i);
        $client->setAge(random_int(10, 70));
        $client->setStatut(random_int(1, 3));
        $em->persist($client);
        $em->flush();
        }

    }
    public function generateZone($em){
        for($i=1; $i<=5;$i++){
            $zone = new Zone;
            $zone->setZone($i);
            $zone->setMajoration(5);
            $em->persist($zone);
            $em->flush();
        }
    }
    
    public function generateBilleterie($em){
        for($i=0; $i<=10; $i++){
            $billeterie = new Billeterie;
            $billeterie->setPlaceVendu(random_int(1000, 40000));
            $em->persist($billeterie);
            $em->flush();
        }
    }
    
    public function generateTarif($em){
        for($i=0;$i<=3;$i++){
        $tarif = new Tarif;
        $tarif->setDenomination('denomination'.$i);
        $tarif->setPrix(100);
        $em->persist($tarif);
        $em->flush();
        }
    }
}
