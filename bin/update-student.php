<?php

use Alura\Doctrine\entity\Student;
use Alura\Doctrine\helper\EntityManagerCreator;

require_once("vendor/autoload.php");

$entityManager = EntityManagerCreator::createEntityManager();

// Pega o repositorio da entidade
// $studentRepository = $entityManager->getRepository(Student::class);
// $student = $studentRepository->find($argv[1]);

$student = $entityManager->find(Student::class, $argv[1]);
$student->name = $argv[2];

// Já está sendo persistido
$entityManager->flush();

$student = $entityManager->find(Student::class, $argv[1]);
var_dump($student);