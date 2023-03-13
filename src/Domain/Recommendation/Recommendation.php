<?php

namespace YP\Arch\Domain\Recommendation;

use DateTimeImmutable;
use YP\Arch\Domain\Student\Student;

class Recommendation
{
    private Student $recommender;
    private Student $recommended;
    private DateTimeImmutable $date;

    public function __construct(Student $recommender, Student $recommended)
    {
        $this->recommender = $recommender;
        $this->recommended = $recommended;
        $this->date = new DateTimeImmutable();
    }
}