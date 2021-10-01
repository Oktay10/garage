<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\User;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();

        $user->setEmail('oktay@gmail.com')
             ->setPrenom('oktay@gmail.com')
             ->setNom('oktay@gmail.com')
             ->setPassword('oktay@gmail.com');
    
        $this->assertTrue($user->getEmail() === 'oktay@gmail.com');
        $this->assertTrue($user->getPrenom() === 'oktay@gmail.com');
        $this->assertTrue($user->getNom() === 'oktay@gmail.com');
        $this->assertTrue($user->getPassword() === 'oktay@gmail.com');
    }

    public function testIsFalse(): void
    {
        $user = new User();

        $user->setEmail('oktay@gmail.com')
             ->setPrenom('oktay@gmail.com')
             ->setNom('oktay@gmail.com')
             ->setPassword('oktay@gmail.com');
    
        $this->assertFalse($user->getEmail() === 'false@gmail.com');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
    }

    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getNom());
        //$this->assertEmpty($user->getPassword());
    }
}
