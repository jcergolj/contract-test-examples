<?php
namespace Tests\WithTrait;

use Exception;

trait PaymentGatewayContractTrait
{
    abstract protected function getPaymentGateway();

    /** @test */
    function charges_with_a_valid_payment_token_are_successful()
    {
        $paymentGateway = $this->getPaymentGateway();
        $this->assertEquals(2500, $paymentGateway->charge(2500, $paymentGateway->getValidTestToken()));
    }

    /** @test */
    function charges_with_an_invalid_payment_token_fail()
    {
        $paymentGateway = $this->getPaymentGateway();

        try {
            $paymentGateway->charge(2500, 'invalid-payment-token');
        } catch (Exception $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail("Charging with an invalid payment token did not throw a Exception.");
    }
}
