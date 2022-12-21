<?php

use Alura\Doctrine\entity\Course;
use Alura\Doctrine\entity\Phone;
use Alura\Doctrine\entity\Student;
use Alura\Doctrine\helper\EntityManagerCreator;

require_once("vendor/autoload.php");

$entityManager = EntityManagerCreator::createEntityManager();

$studentId = $argv[1];
$courseId = $argv[2];

$student = $entityManager->find(Student::class, $studentId);
$course = $entityManager->find(Course::class, $courseId);

$student->enrollInCourse($course);

$entityManager->flush();