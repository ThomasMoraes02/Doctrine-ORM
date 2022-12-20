<?php

use Alura\Doctrine\helper\EntityManagerCreator;

require_once("vendor/autoload.php");

$entityManager = EntityManagerCreator::createEntityManager();

var_dump($entityManager);