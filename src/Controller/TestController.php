<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
class TestController extends AbstractController
{

    #[Route(path: '/home', methods: ['get'])]
    public function s3Upload(): JsonResponse
    {
        return new JsonResponse(['message' => 'Welcome to Clean Architect Demo']);
    }
}
