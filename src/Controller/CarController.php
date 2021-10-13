<?php

namespace App\Controller;

use App\Entity\Vehicule;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarController extends AbstractController
{
    /**
     * @Route("/car", name="car")
     */
    public function index(): Response
    {
        $car = $this->getDoctrine()->getRepository(Vehicule::class)->findAll();     

        return $this->render('car/index.html.twig', [
            'car' => $car
        ]);
    }

    /**
     * @Route("/car/{id}", name="car_show")
     */
    public function showCar($id): Response
    {
        $carShow = $this->getDoctrine()->getRepository(Vehicule::class)->find($id);     

        return $this->render('car/show.html.twig', [
            'car' => $carShow
        ]);
    }
}
