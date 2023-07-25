<?php

namespace App\Controller;

use App\Message\SendNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MessageBusInterface $bus): JsonResponse
    {
        $bus->dispatch(new SendNotification('Hello,world is beautiful',
            ['user1@example.com', 'user2@example.com', 'user3@example.com']));
        return $this->json([
            'message' => 'Welcome to your new controller!',
        ]);
    }
}
