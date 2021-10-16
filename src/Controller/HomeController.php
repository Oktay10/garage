<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Entity\Reservation;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
    	$reservation = $this->getDoctrine()->getRepository(Reservation::class);
        $lesReservations = $reservation->findBy(["user" => $this->getUser()]);

    	$reservations = array();

    	foreach ($lesReservations as $uneReservation) 
    	{    		
    			$details = $this->getDoctrine()->getRepository(Vehicule::class);
    			$lesDetails = $details->findBy(["id" => $uneReservation->getVehicule()]);
				//dd($lesDetails);
    			$uneReserv = array();
    			$uneReserv["reservation"] = $lesDetails;
    			$uneReserv["detail"] = $uneReservation;
    			$reservations[] = $uneReserv;
    	}

		//dd($lesReservations);
        
        return $this->render('home/index.html.twig', [
            'LesReservations' => $reservations,
        ]);
    }
}
