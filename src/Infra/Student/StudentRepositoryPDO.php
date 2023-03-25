<?php

namespace YP\Arch\Infra\Student;

use YP\Arch\Domain\CPF;
use YP\Arch\Domain\Student\Student;
use YP\Arch\Domain\Student\StudentRepository;

class StudentRepositoryPDO implements StudentRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function addStudent(Student $student): void
    {
        $sql = 'INSERT INTO students VALUES (:cpf, :name, :email);';
        $statement = $this->connection->prepare(($sql));
        $statement->bindValue('cpf', $student->cpf());
        $statement->bindValue('name', $student->name());
        $statement->bindValue('email', $student->email());
        $statement->execute();

        $sql = 'INSERT INTO phones VALUES (:ddd, :number, :student_cpf)';
        $statement = $this->connection->prepare($sql);
        $statement->bindValue('student_cpf', $student->cpf());

        foreach ($student->phones() as $phone) {
            $statement->bindValue('phone', $phone->number());
            $statement->bindValue('ddd', $phone->ddd());
            $statement->execute();
        }
    }

    public function getStudentByCPF(CPF $cpf): Student
    {
        $sql = 'SELECT * FROM students where cpf = :cpf';
        $statement = $this->connection->prepare($sql);
        $statement->bindValue('cpf', $cpf);
        $res = $statement->execute();
    }
}