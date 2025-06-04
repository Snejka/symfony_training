<?php

namespace App\Controller;

use App\Entity\Projects;
use App\Repository\ProjectsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProjectsController extends AbstractController
{
    // #[Route('/projects/{id}', name: 'app_projects')]
    // public function index(EntityManagerInterface $entityManager, int $id): Response
    // {
    //     $product = $entityManager->getRepository(Projects::class)->find($id);

    //     if(!$product) {
    //         throw $this->createNotFoundException(
    //             'No product found for ID: ' .$id
    //         );
    //     }

    //     return $this->render('projects/index.html.twig', [
    //         'controller_name' => 'ProjectsController',
    //         'name' => $product->getProjectName(),
    //     ]);
    // }

     #[Route('/projects/{id}', name: 'app_projects')]
    public function index(ProjectsRepository $projectRepo, int $id): Response
    {
        $product = $projectRepo->findProductById($id);

        if(!$product) {
            throw $this->createNotFoundException(
                'No product found for ID: ' .$id
            );
        }

        return $this->render('projects/index.html.twig', [
            'controller_name' => 'ProjectsController',
            'name' => $product->getProjectName(),
        ]);
    }

    #[Route('/new-project', name: 'create_project')]
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
