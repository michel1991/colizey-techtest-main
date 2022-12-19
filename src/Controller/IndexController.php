<?php

declare(strict_types=1);

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class IndexController
{
    #[Route('/', name: 'www_index')]
    #[Template('index.html.twig')]
    public function indexAction(): array
    {
        return [];
    }
}
