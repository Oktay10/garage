<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Reservation;
use App\Entity\User;
use App\Entity\Vehicule;
use DateTime;

class ReservationUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $reservation = new Reservation();
        $date = new DateTime();
        $user = new User();
        $vehicule = new Vehicule();

        $reservation->setDateReservation($date)
             ->setDateDebutLoc($date)
             ->setDateFinLoc($date)
             ->setEssenceConso(10)
             ->setEstRendu(true)
             ->setUser($user)
             ->setVehicule($vehicule);
    
        $this->assertTrue($reservation->getDateReservation() === $date);
        $this->assertTrue($reservation->getDateDebutLoc() === $date);
        $this->assertTrue($reservation->getDateFinLoc() === $date);
        $this->assertTrue($reservation->getEssenceConso() === 10);
        $this->assertTrue($reservation->getEstRendu() === true);
        $this->assertTrue($reservation->getUser() === $user);
        $this->assertTrue($reservation->getVehicule() === $vehicule);
    }

    public function testIsFalse(): void
    {
        $reservation = new Reservation();
        $date = new DateTime();
        $user = new User();
        $vehicule = new Vehicule();

        $reservation->setDateReservation($date)
             ->setDateDebutLoc($date)
             ->setDateFinLoc($date)
             ->setEssenceConso(10)
             ->setEstRendu(true)
             ->setUser($user)
             ->setVehicule($vehicule);
    
            $this->assertFalse($reservation->getDateReservation() === new DateTime());
            $this->assertFalse($reservation->getDateDebutLoc() === new DateTime());
            $this->assertFalse($reservation->getDateFinLoc() === new DateTime());
            $this->assertFalse($reservation->getEssenceConso() === 11);
            $this->assertFalse($reservation->getEstRendu() === false);
            $this->assertFalse($reservation->getUser() === new User());
            $this->assertFalse($reservation->getVehicule() === new Vehicule());
    }

    public function testIsEmpty(): void
    {
        $reservation = new Reservation();
    
             $this->assertEmpty($reservation->getDateReservation());
             $this->assertEmpty($reservation->getDateDebutLoc());
             $this->assertEmpty($reservation->getDateFinLoc());
             $this->assertEmpty($reservation->getEssenceConso());
             $this->assertEmpty($reservation->getEstRendu());
             $this->assertEmpty($reservation->getUser());
             $this->assertEmpty($reservation->getVehicule());
    }
}
