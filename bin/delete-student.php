<?php

use Alura\Doctrine\entity\Student;
use Alura\Doctrine\helper\EntityManagerCreator;

require_once("vendor/autoload.php");

$entityManager = EntityManagerCreator::createEntityManager();
// $student = $entityManager->find(Student::class, $argv[1]);

// Pega a referencia da entidade sem precisar fazer uma query a mais
$student = $entityManager->getPartialReference(Student::class, $argv[1]);

$entityManager->remove($student);
$entityManager->flush();