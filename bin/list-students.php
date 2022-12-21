<?php

use Alura\Doctrine\entity\Student;
use Alura\Doctrine\helper\EntityManagerCreator;

require_once("vendor/autoload.php");

$entityManager = EntityManagerCreator::createEntityManager();

// Pega o repositorio da entidade
$studentRepository = $entityManager->getRepository(Student::class);

// Pega todos os registros
/** @var Student[] $studentsList */
$studentsList = $studentRepository->findAll();

foreach($studentsList as $student) {
    echo "ID: $student->id\n Nome: $student->name\n\n";
    echo "Telefones: \n";

    foreach($student->phones() as $phone) {
        echo $phone->number . PHP_EOL;
    }

    echo PHP_EOL;
}

/** @var Student $student */
$student = $studentRepository->find(2);
echo $student->name . PHP_EOL;

// Retorna um array associativo
$student = $studentRepository->findBy([
    'name' => 'Isabella Moraes'
]);
var_dump($student[0]->name);

// Retornar um
$student = $studentRepository->findOneBy([
    'name' => 'Isabella Moraes'
]);
var_dump($student->name);

// Quantos registros existem
var_dump($studentRepository->count([]));