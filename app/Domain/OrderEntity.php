<?php

namespace App\Domain;

final class OrderEntity
{
    private $customer_name;
    private $customer_email;
    private $customer_mobile;
    private $status;

    public function __construct($customer_name, $customer_mobile, $customer_email, $status)
    {
        $this->customer_name = $customer_name;
        $this->customer_mobile = $customer_mobile;
        $this->customer_email = $customer_email;
        $this->status = $status;
    }

    public function getCustomerName(): string
    {
        return $this->customer_name;
    }

    public function getCustomerMobile(): string
    {
        return $this->customer_mobile;
    }

    public function getCustomerEmail(): string
    {
        return $this->customer_email;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    private function changeStatus()
    {
        
    }
}