<?php
namespace Tests\WithTrait;

use App\FakePaymentGateway;
use PHPUnit\Framework\TestCase;
use Tests\WithTrait\PaymentGatewayContractTrait;

class FakePaymentGatewayTest extends TestCase
{
    use PaymentGatewayContractTrait;

    protected function getPaymentGateway()
    {
        return new FakePaymentGateway;
    }
}
