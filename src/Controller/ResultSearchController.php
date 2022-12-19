<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultSearchController extends AbstractController
{
    #[Route('/result/search', name: 'app_result_search')]
    public function index(): Response
    {
        return $this->render('result_search/index.html.twig', [

            'controller_name' => 'ResultSearchController',
        ]);
    }
}
