<?php

namespace App\Engine;

use App\Entity\Post;
use App\Repository\PostRepository;

class PostSearchEngine
{
    public function __construct(private PostRepository $repository){
    }

    /**
     * @return Post[]
     */
    public function getAll(): array
    {
        return $this->repository->searchAll();
    }
}
