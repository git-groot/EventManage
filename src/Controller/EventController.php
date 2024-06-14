<?php

namespace App\Controller;

use App\Services\EventServices;
use App\Utils\ApiResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EventController extends AbstractController
{
    #[Route('/event', name: 'app_event')]
    public function index(): Response
    {
        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
        ]);
    }

    #[Route("/api/bookevent", name: "bookevent", methods: "POST")]
    public function bookevent(Request $request, EventServices $eventServices)
    {
        $result = $eventServices->bookevent($request);
        return new ApiResponse($result,200, ["Content-Type" => "application/json"], 'json', "Success", ['timezone', "_initializer", "cloner", "isInitialized_", "password"] );

    }
}
