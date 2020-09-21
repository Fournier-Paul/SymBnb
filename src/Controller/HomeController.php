<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Container;

class HomeController extends AbstractController{

    /**
     * @Route("/", name="homepage")
     */

    public function home(){
          return $this->render(
              'home.html.twig'
          );
    }

}