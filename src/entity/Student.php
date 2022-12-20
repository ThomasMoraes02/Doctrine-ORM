<?php 
namespace Alura\Doctrine\entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;

// Informa ao doctrine que é uma entidade
#[Entity]
class Student
{
    // Id gerado automáticamente
    #[Id]
    #[GeneratedValue]
    #[Column]
    public readonly int $id;

    // Passando parâmetro e já inicializando (readonly sem setar outro valor)
    public function __construct(
        // Dizendo que é uma coluna
        #[Column]
        public readonly string $name
    ) {
    }
}