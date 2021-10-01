<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Vehicule;

class VehiculeUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $vehicule = new Vehicule();

        $vehicule->setMarque('oktay@gmail.com')
             ->setModele('oktay@gmail.com')
             ->setKilometre(10)
             ->setTypeVehicule('oktay@gmail.com')
             ->setEstDispo(true)
             ->setFile('oktay@gmail.com');
    
        $this->assertTrue($vehicule->getMarque() === 'oktay@gmail.com');
        $this->assertTrue($vehicule->getModele() === 'oktay@gmail.com');
        $this->assertTrue($vehicule->getKilometre() === 10);
        $this->assertTrue($vehicule->getTypeVehicule() === 'oktay@gmail.com');
        $this->assertTrue($vehicule->getEstDispo() === true);
        $this->assertTrue($vehicule->getFile() === 'oktay@gmail.com');
    }

    public function testIsFalse(): void
    {
        $vehicule = new Vehicule();

        $vehicule->setMarque('oktay@gmail.com')
             ->setModele('oktay@gmail.com')
             ->setKilometre(10)
             ->setTypeVehicule('oktay@gmail.com')
             ->setEstDispo(true)
             ->setFile('oktay@gmail.com');
    
             $this->assertFalse($vehicule->getMarque() === 'false@gmail.com');
             $this->assertFalse($vehicule->getModele() === 'false');
             $this->assertFalse($vehicule->getKilometre() === 11);
             $this->assertFalse($vehicule->getTypeVehicule() === 'false');
             $this->assertFalse($vehicule->getEstDispo() === false);
             $this->assertFalse($vehicule->getFile() === 'false');
    }

    public function testIsEmpty(): void
    {
        $vehicule = new Vehicule();
    
             $this->assertEmpty($vehicule->getMarque());
             $this->assertEmpty($vehicule->getModele());
             $this->assertEmpty($vehicule->getKilometre());
             $this->assertEmpty($vehicule->getTypeVehicule());
             $this->assertEmpty($vehicule->getEstDispo());
             $this->assertEmpty($vehicule->getFile());
    }
}
