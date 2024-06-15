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
    //post
    #[Route("/api/bookevent", name: "bookevent", methods: "POST")]
    public function bookevent(Request $request, EventServices $eventServices)
    {
        $result = $eventServices->bookevent($request);
        return new ApiResponse($result, 200, ["Content-Type" => "application/json"], 'json', "Success", ['timezone', "_initializer", "cloner", "isInitialized_", "password"]);
    }
    // update
    #[Route("/api/update/evenbook/{id}", name: "updateevenbook", methods: "POST")]
    public function updateEven(Request $request, $id, EventServices $eventServices)
    {

        $result = $eventServices->updateEven($request, $id);
        if ($result == null) {
            return new ApiResponse([], 400, ["Content-Type" => "application/json"], 'json', $result, ['timezone']);
        }
        return new ApiResponse($result, 200, ["Content-Type" => "application/json"], 'json', "Success", ['timezone', "_initializer", "cloner", "inInitialized_", "password"]);
    }
    // getSingle
    #[Route("/api/getsingle/bookevent/{id}", name: "getsinglebookevent", methods: "GET")]
    public function getsinglebookevent($id, EventServices $eventServices)
    {
        $result = $eventServices->getsinglebookevent($id);
        return new ApiResponse($result, 200, ["Content-Type" => "application/json"], 'json', "Success", ['timezone', "_initializer", "cloner", "isInitialized_", "password"]);
    }
    // getall
    #[Route("/api/getall/booking", name: "getallbookevent", methods: "GET")]
    public function getallbookevent(Request $request, EventServices $eventServices)
    {
        $result = $eventServices->getallbookevent();
        return new ApiResponse($result, 200, ["Content-Type" => "application/json"], 'json', "Success", ['timezone', "_initializer", "cloner", "isInitialized_", "password"]);
    }
    // post
    
}
