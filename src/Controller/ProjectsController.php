<?php

namespace App\Controller;

use App\Entity\Projects;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProjectsController extends AbstractController
{
    #[Route('/projects', name: 'app_projects')]
    public function index(): Response
    {
        return $this->render('projects/index.html.twig', [
            'controller_name' => 'ProjectsController',
        ]);
    }

    #[Route('/project', name: 'create_project')]
    public function createProduct(EntityManagerInterface $entityManager): Response
    {
        $project = new Projects();
        $project->setProjectName('ITSL Group Web Site');
        $project->setDescription('Desc');
        $project->setUrl('itslgroup.com');
        $project->setImage('itsl.jpg');
        $project->setTech('PHP, HTML, CSS, Bootstrap, WordPress');
        $project->setClient('ITSL Group - London');


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($project);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new project with id '.$project->getId());
    }
}
