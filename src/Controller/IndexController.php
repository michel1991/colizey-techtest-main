<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Post;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class IndexController
{
    public function __construct(
        private ManagerRegistry $managerRegistry
    ) {
    }

    #[Route('/', name: 'www_index')]
    #[Template('index.html.twig')]
    public function indexAction(): array
    {
        $posts = $this->managerRegistry->getRepository(Post::class)->findBy([], ['id' => 'ASC'], 100);

        return [
            'posts' => $posts,
        ];
    }
}
