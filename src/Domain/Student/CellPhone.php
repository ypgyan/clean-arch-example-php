<?php

namespace YP\Arch\Domain\Student;

use InvalidArgumentException;
use Stringable;

class CellPhone implements Stringable
{
    private string $ddd;
    private string $number;

    /**
     * @param string $ddd
     * @param string $number
     */
    public function __construct(string $ddd, string $number)
    {
        $this->setDDD($ddd);
        $this->setNumber($number);
    }

    private function setDDD(string $ddd): void
    {
        if (preg_match('/\d{2}/', $ddd) !== 1) {
            throw new InvalidArgumentException('Invalid DDD');
        }
        $this->ddd = $ddd;
    }

    private function setNumber(string $number): void
    {
        if (preg_match('/\d{8,9}/', $number) !== 1) {
            throw new InvalidArgumentException('Invalid number');
        }
        $this->number = $number;
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->number}";
    }

    public function number(): string
    {
        return $this->number;
    }

    public function ddd(): string
    {
        return $this->ddd;
    }
}