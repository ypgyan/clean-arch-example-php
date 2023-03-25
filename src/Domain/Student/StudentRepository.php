<?php

namespace YP\Arch\Domain\Student;

use YP\Arch\Domain\CPF;

interface StudentRepository
{
    public function addStudent(Student $student):void ;
    public function getStudentByCPF(Cpf $cpf): Student;
}