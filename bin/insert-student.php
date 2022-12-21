<?php

use Alura\Doctrine\entity\Phone;
use Alura\Doctrine\entity\Student;
use Alura\Doctrine\helper\EntityManagerCreator;

require_once("vendor/autoload.php");

$entityManager = EntityManagerCreator::createEntityManager();

// $student = new Student("Thomas Moraes");
$student = new Student($argv[1]);

// Adicionando telefones
$student->addPhone(new Phone($argv[2]));
$student->addPhone(new Phone($argv[3]));

$entityManager->persist($student);

// Pegar tudo o que o entityManager está observando e executa
$entityManager->flush();  