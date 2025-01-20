<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Entity\Wallet;

class WalletTest extends TestCase
{

    public function testWallet(): void
    {
        $wallet = new Wallet('USD');
        $this->assertEquals('USD', $wallet->getCurrency());
        $this->assertEquals(0, $wallet->getBalance());

    }

    public function testAddFund(): void
    {
        $wallet = new Wallet('USD');
        $wallet->addFund(100);
        $this->assertEquals(100, $wallet->getBalance());

    }
}
