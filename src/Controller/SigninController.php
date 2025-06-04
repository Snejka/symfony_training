<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\SigninType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SigninController extends AbstractController
{
    #[Route('/signin', name: 'app_signin')]
    public function index(): Response
    {
        $user = new User();
        $form = $this->createForm(SigninType::class, $user);

        return $this->render('signin/index.html.twig', [
            'signin_form' => $form->createView(),
        ]);
    }
}
