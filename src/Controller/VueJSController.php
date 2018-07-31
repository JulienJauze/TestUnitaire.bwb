<?php

namespace App\Controller;

use App\Entity\Traitements\Calcul;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class VueJSController extends Controller
{
    /**
     * @Route("/vuejs", name="vuejs")
     */
    public function index()
    {
        $calcul = new Calcul();
        return $this->render('vuejs/index.html.twig', [
            'controller_name' => 'VueJSController',
            'calcul' => $calcul
        ]);
    }
}
