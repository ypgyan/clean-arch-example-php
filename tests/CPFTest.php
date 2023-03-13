<?php

namespace YP\Arch\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use YP\Arch\CPF;

class CPFTest extends TestCase
{
    public function testInvalidCPF()
    {
        $this->expectException(InvalidArgumentException::class);
        new CPF('invalid CPF');
    }

    public function testCreateCPFSuccesfully()
    {
        $cpf = new CPF('123.456.789-09');
        $this->assertSame('123.456.789-09', (string)$cpf);
    }
}