<?php

namespace App;

interface PaymentGateway
{
    public function charge($amount, $token);

    public function getValidTestToken();
}
