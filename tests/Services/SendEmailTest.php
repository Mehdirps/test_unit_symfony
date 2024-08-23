<?php

namespace App\Tests\Services;

use App\Service\Invoice;
use App\Service\EmailService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SendEmailTest extends KernelTestCase
{
    /**
     * TEST V1
     */
    public function testSendEmail()
    {
        $emailService = $this->createMock(EmailService::class);
        $emailService->method('send')
            ->willReturn(true);

        $invoice = new Invoice($emailService);
        $this->assertEquals(true, $invoice->process('mehdi', 'message'));
    }

    /**
     * Othe version with before(setUp) & after(tearDown) methods
     */
    // private $emailService;

    // public function setUp(): void
    // {
    //     $this->emailService = $this->createMock(EmailService::class);
    //     $this->emailService->method('send')
    //         ->willReturn(true);
    // }

    // public function tearDown(): void
    // {
    //     $this->emailService = null;
    // }

    // public function testSendEmail()
    // {
    //     $invoice = new Invoice($this->emailService);
    //     $this->assertEquals(true, $invoice->process('mehdi', 'message'));
    // }
}
