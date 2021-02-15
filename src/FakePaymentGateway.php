<?php

namespace App;

use Exception;

class FakePaymentGateway implements PaymentGateway
{
    public function getValidTestToken()
    {
        return "valid-token";
    }

    public function charge($amount, $token)
    {
        if ($token !== $this->getValidTestToken()) {
            throw new Exception;
        }
        return $amount;
    }
}
