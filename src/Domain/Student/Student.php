<?php

namespace YP\Arch\Domain\Student;

use YP\Arch\Domain\CPF;
use YP\Arch\Domain\Email;
use YP\Arch\Domain\Recommendation\Recommendation;

class Student
{
    private CPF $cpf;
    private string $name;
    private Email $email;
    private array $phones;
    private Recommendation $recommendation;
    private string $phone;

    /**
     * Named Constructor example
     *
     * @param string $cpfNumber
     * @param string $email
     * @param string $name
     * @return Student
     */
    public static function withCpfEmailName(string $cpfNumber, string $email, string $name): Student
    {
        return new Student(new Cpf($cpfNumber), $name, new Email($email));
    }

    /**
     * @param string $cpf
     * @param string $name
     * @param string $email
     */
    public function __construct(string $cpf, string $name, string $email)
    {
        $this->cpf = new CPF($cpf);
        $this->name = $name;
        $this->email = new Email($email);
    }

    /**
     * @param string $ddd
     * @param string $number
     * @return $this
     */
    public function addPhone(string $ddd, string $number): Student
    {
        $this->phones[] = new CellPhone($ddd, $number);
        return $this;
    }

    public function cpf(): string
    {
        return $this->cpf;
    }

    public function name(): string
    {
        return $this->name();
    }

    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return CellPhone[]
     */
    public function phones(): array
    {
        return $this->phones;
    }
}