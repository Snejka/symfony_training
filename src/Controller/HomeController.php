<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    // index() return a responce and serve for Entry point
    //There are other posible functions
    public function index(): Response
    {
        //Render the corresponding twig template
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'param' => 'My Parameter'
            //we can have diffrenttypes of parameters here
        ]);
    }
}
