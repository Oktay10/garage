<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Vehicule;
use App\Entity\Reservation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    /**
     * @Route("/formulaireReservation/{id}", name="formReservation")
     */
    public function index($id): Response
    {
        $car = $this->getDoctrine()->getRepository(Vehicule::class)->find($id);     

        return $this->render('reservation/index.html.twig', [
            'car' => $car,
        ]);
    }

    /**
     * @Route("/reservation/{id}", name="reservation")
     */
    public function reservation(Request $request, $id): Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)->findBy(array('id' => $this->getUser()));
        $car = $this->getDoctrine()->getRepository(Vehicule::class)->find($id);     
        $vehicule = $this->getDoctrine()->getRepository(Vehicule::class)->findBy(array('id' => $car));

        $dateD = \DateTime::createFromFormat('Y-m-d',date('Y-m-d',strtotime($request->get('dateD'))));
        $dateF = \DateTime::createFromFormat('Y-m-d',date('Y-m-d',strtotime($request->get('dateF'))));
        $em = $this->getDoctrine()->getManager();
        $vehicule[0]->setEstDispo(1);
        $maReservation = new Reservation();
        $maReservation->setUser($user[0]);  
        $maReservation->setVehicule($vehicule[0]);
        $maReservation->setDateReservation(\DateTime::createFromFormat('Y-m-d',date("Y-m-d")));
        $maReservation->setDateDebutLoc($dateD);
        $maReservation->setDateFinLoc($dateF);
        $maReservation->setEssenceConso(0);   
        $maReservation->setEstRendu("");   

        //dd($maReservation);

        $em->persist($maReservation);
        $em->flush();
        return $this->redirect($this->generateUrl('home'));
    }

    /**
    * @Route("/formulaireApresUtil/{id}", name="formulaire_Ap_Util")  
    */
    public function formulaireApUtilisationAction($id): Response
    {
         // Va me permettre de recup les donnees du formulaire 
        $leVehicule = $this->getDoctrine()->getRepository(Vehicule::class)->find($id);   
        return $this->render('home/formulaireLocAp.html.twig', [
            'leVehicule' => $leVehicule
        ]);
    }

    /**
    * @Route("/detailApresUtilisation/{id}", name="detail_Ap_Util")  
    */
	public function detailApresUtilisationAction(Request $request, $id): Response
	{
		// va me permettre de recuperer les donnees
		$kilometre = $request->get('kilometre');
		$conso = $request->get('conso');
        $leVehicule = $this->getDoctrine()->getRepository(Vehicule::class)->find($id);   
        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository(User::class)->findBy(array('id' => $this->getUser()));		
		
		$qB = $em->getRepository(Reservation::class)->createQueryBuilder('r');
		$qB ->update(Reservation::class, 'r')
			->set('r.estRendu', '?1')
			->set('r.essenceConso', '?2')
			->where('r.user = ?3 AND r.vehicule = ?4')
			->setParameter(1, 1)
			->setParameter(2, $conso)
			->setParameter(3, $user)
			->setParameter(4, $leVehicule)
			->getQuery()
			->getResult();
            			
	    $qB2 = $em->getRepository(Vehicule::class)->createQueryBuilder('v');
		$qB2 ->update(Vehicule::class, 'v')
			->set('v.kilometre', '?1')
            ->set('v.estDispo', 0)	
			->where('v.id = ?4')
			->setParameter(1,$kilometre)	
			->setParameter(4,$leVehicule)
			->getQuery()
			->getResult();


        return $this->redirect($this->generateUrl('home'));
	}
}
