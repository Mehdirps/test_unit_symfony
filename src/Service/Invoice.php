<?php

namespace App\Service;

use App\Service\EmailService;

class Invoice
{
    private EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function process($email, $message)
    {
        return $this->emailService->send($email, $message);
    }
}
