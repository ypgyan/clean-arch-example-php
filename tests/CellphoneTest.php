<?php

namespace YP\Arch\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use YP\Arch\Domain\Student\CellPhone;

class CellphoneTest extends TestCase
{
    public function testCreatePhoneSuccess()
    {
        $phone = new CellPhone('27', '123123123');
        $this->assertSame('(27) 123123123', (string)$phone);
    }

    public function testInvalidPhone()
    {
        $this->expectException(InvalidArgumentException::class);
        new CellPhone('27', 'telefone inválido');
    }

    public function testInvalidDDD()
    {
        $this->expectException(InvalidArgumentException::class);
        new CellPhone('dd', '123123123');
    }
}