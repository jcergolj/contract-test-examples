<?php
namespace Tests\WithTrait;

use App\StripePaymentGateway;
use PHPUnit\Framework\TestCase;
use Tests\WithTrait\PaymentGatewayContractTrait;

/**
 * @group integration
 */
class StripePaymentGatewayTest extends TestCase
{
    use PaymentGatewayContractTrait;

    protected function getPaymentGateway()
    {
        return new StripePaymentGateway('secret-stripe-key');
    }
}
