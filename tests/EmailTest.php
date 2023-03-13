<?php

namespace YP\Arch\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use YP\Arch\Email;

class EmailTest extends TestCase
{
    public function testInvalidEmail()
    {
        $this->expectException(InvalidArgumentException::class);
        new Email('Email Inválido');
    }

    public function testSuccesfullyCreateEmail()
    {
        $email = new Email('teste@mail.com');
        $this->assertsame('teste@mail.com', (string)$email);
    }
}