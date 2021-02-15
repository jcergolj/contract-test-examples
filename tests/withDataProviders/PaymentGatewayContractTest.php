<?php
namespace Tests\WithDataProviders;

use App\FakePaymentGateway;
use App\StripePaymentGateway;
use Exception;
use PHPUnit\Framework\TestCase;

class PaymentGatewayContractTest extends TestCase
{
    /**
     * @test
     * @dataProvider gatewaysProviders
     */
    function charges_with_a_valid_payment_token_are_successful($paymentGateway)
    {
        $charge = $paymentGateway->charge(2500, $paymentGateway->getValidTestToken());

        $this->assertSame(2500, $charge);
    }

    /**
     * @test
     * @dataProvider gatewaysProviders
     */
    function charges_with_an_invalid_payment_token_fail($paymentGateway)
    {
        try {
            $paymentGateway->charge(2500, 'invalid-payment-token');
        } catch (Exception $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail("Charging with an invalid payment token did not throw a PaymentFailedException.");
    }

    public function gatewaysProviders()
    {
        return [
             'Fake payment gateway' => [new FakePaymentGateway()],
             'Stripe payment gateway' => [new StripePaymentGateway('secret-stripe-key')]
        ];
    }
}
