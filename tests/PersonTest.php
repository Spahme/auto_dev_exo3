<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Entity\Person;

class PersonTest extends TestCase
{

    public function testPerson(): void
    {
        $person = new Person('John Doe', 'USD');
        $this->assertEquals('John Doe', $person->getName());
        $this->assertEquals('USD', $person->getWallet()->getCurrency());
    }

    public function testInvalidName(): void
    {
        $this->expectException(\Exception::class);
        $person = new Person('', 'USD');
    }

    public function testInvalidCurrency(): void
    {
        $this->expectException(\Exception::class);
        $person = new Person('John Doe', 'JPY');
    }

    public function testInvalidTransaction(): void
    {
        $this->expectException(\Exception::class);
        $person = new Person('John Doe', 'USD');
        $person->getWallet()->addFund(-100);
    }
    public function testInvalidTransactionV2(): void
    {
        $this->expectException(\Exception::class);
        $person = new Person('John Doe', 'USD');
        $person->getWallet()->removeFund(+100);
    }
    public function testInvalidTransactionV3(): void
    {
        $this->expectException(\Exception::class);
        $person = new Person('John Doe', 'USD');
        $person->getWallet()->removeFund(-100);
    }

    public function testTransfertFund(): void
    {
        $person = new Person('John Doe', 'USD');
        $person2 = new Person('Jane Doe', 'USD');

        $person->getWallet()->addFund(100);
        $person->transfertFund(100, $person2);

        $this->assertEquals(0, $person->wallet->getBalance());
        $this->assertEquals(100, $person2->wallet->getBalance());
    }
}
