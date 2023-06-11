<?php
include __DIR__.'/Traits.php';

include __DIR__.'/Entities.php';
include __DIR__.'/Managers.php';

use MyApp\Managers\StudentManager;
use MyApp\Entities\Student;
use MyApp\Entities\Course;

$manager = new StudentManager();

// Create students
$student1 = new Student(1, "Ahlam Yosef", "alayesf931@gmail.com");
$student2 = new Student(2, "Ahmad Ali", "Ahamd123@gmail.com");

// Create courses
$course1 = new Course(1, "Math");
$course2 = new Course(2, "Science");

// Add courses to students
$student1->addCourse($course1);
$student2->addCourse($course2);

// Add students to the manager
$manager->addStudent($student1);
$manager->addStudent($student2);

// Delete student
// $manager->deleteStudent($student2);

$rStudent = $manager->getStudentById(1);
if ($rStudent) {
    echo "Student ID: " . $rStudent->getId() . "\n";
    echo "Student Name: " . $rStudent->getName() . "\n";
    echo "Student Email: " . $rStudent->getEmail() . "\n";
    echo "Courses:\n";
    $courses = $rStudent->getCourses();
    foreach ($courses as $course) {
        echo "- Course ID: " . $course->getId() . ", Course Name: " . $course->getName() . "\n";
    }
} else {
    echo "Student not found.\n";
}

// Update student 
$manager->updateStudent($student1, "Ahlam Alghamri", "AhlamYos@gmail.com");

// Delete student
$manager->deleteStudent($student2);