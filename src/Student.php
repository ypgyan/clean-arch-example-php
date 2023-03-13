<?php

namespace YP\Arch;
class Student
{
    private CPF $cpf;
    private string $name;
    private Email $email;
    private array $phones;

    public function addPhone(string $ddd, string $number): void
    {
        $this->phones[] = new CellPhone($ddd, $number);
    }
}