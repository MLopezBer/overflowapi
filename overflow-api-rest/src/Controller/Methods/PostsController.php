<?php

namespace App\Controller\Methods;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/posts')]
class PostsController extends AbstractController
{
    #[Route('/getPostById/{id}', name: 'app_posts')]
    public function index(int $id): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'value' => $id,
        ]);
    }
}
