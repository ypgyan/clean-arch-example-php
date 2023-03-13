<?php

namespace YP\Arch;

use InvalidArgumentException;
use Stringable;

class CPF implements Stringable
{
    private string $number;

    public function __construct(string $number)
    {
        $this->setNumber($number);
    }

    /**
     * @param string $number
     * @return void
     */
    private function setNumber(string $number): void
    {
        $options = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];

        if (filter_var($number, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new InvalidArgumentException('CPF inválido');
        }

        $this->number = $number;
    }

    public function __toString(): string
    {
        return $this->number;
    }
}