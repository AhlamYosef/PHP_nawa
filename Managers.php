<?php

namespace MyApp\Managers;

use MyApp\Entities\Student;
use MyApp\Traits\Loggable;

class StudentManager
{
    use Loggable;

    private $students;

    public function __construct()
    {
        $this->students = [];
    }

    public function addStudent(Student $student)
    {
        $this->students[$student->getId()] = $student;
        $this->log('Added student: ' . $student->getId());
    }

    public function getStudentById($id)
    {
        if (isset($this->students[$id])) {
            return $this->students[$id];
        }
        return null;
    }

    public function updateStudent(Student $student, $name, $email)
{
    $student->setName($name);
    $student->setEmail($email);
    $this->log('Updated student: ' . $student->getId());
}

    public function deleteStudent(Student $student)
    {
        unset($this->students[$student->getId()]);
        $this->log('Deleted student: ' . $student->getId());
    }
}
