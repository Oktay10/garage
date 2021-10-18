<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarController extends AbstractController
{
    /**
     * @Route("/car", name="car")
     */
    public function index(Request $request, VehiculeRepository $carRepository): Response
    {
        $cars = [];
        $cars = $this->getDoctrine()->getRepository(Vehicule::class)->findBy(["estDispo" => 0]);

        $voiture = new Vehicule();
        $form = $this->createForm(VehiculeType::class, $voiture);
        if($form->handleRequest($request)->isSubmitted() && $form->isValid()){
            $critere = $form->getData();
            //dd($critere);
            $cars = $carRepository->searchCar($critere);
            //dd($cars);

        }
        //dd($car);
        return $this->render('car/index.html.twig', [
            'form' => $form->createView(),
            'cars' => $cars
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
