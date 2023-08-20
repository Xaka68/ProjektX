<?php

namespace App\Event;

use App\Entity\Student;
use Symfony\Contracts\EventDispatcher\Event;

class AddStudentEvent extends Event
{
const ADD_STUDENT_EVENT = 'student.add';

public function __construct(private Student $student)
{}

    /**
     * @return Student
     */
    public function getStudent(): Student
    {
        return $this->student;
    }
}