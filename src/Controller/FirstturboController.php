<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FirstturboController extends AbstractController
{
    #[Route('/firstturbo', name: 'app_firstturbo')]
    public function index(): Response
    {
        return $this->render('firstturbo/index.html.twig', [
            'controller_name' => 'FirstturboController',
        ]);
    }
}
