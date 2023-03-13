<?php

namespace YP\Arch;

use DateTimeImmutable;

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