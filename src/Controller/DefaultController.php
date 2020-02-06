<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to Travelyo API'
        ]);
    }
}
