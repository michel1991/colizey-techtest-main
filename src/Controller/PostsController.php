<?php

namespace App\Controller;

use App\Engine\PostSearchEngine;
use App\Entity\GroupName;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostsController extends AbstractController
{
    #[Route('/posts', name: 'app_posts')]
    public function index(PostSearchEngine $postSearchEngineImpl): JsonResponse
    {
        $context = ['groups' => [GroupName::FILTERABLE]];

        $result =  $postSearchEngineImpl->getAll();

        return $this->json($result, Response::HTTP_OK, [], $context );
    }
}
