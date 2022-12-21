<?php 
namespace Alura\Doctrine\entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\OneToMany;

// Informa ao doctrine que é uma entidade
#[Entity]
class Student
{
    // Id gerado automáticamente
    #[Id, GeneratedValue, Column]
    public int $id;

    #[OneToMany(targetEntity:Phone::class, mappedBy:"student")]
    private readonly Collection $phones;

    // Passando parâmetro e já inicializando (readonly sem setar outro valor)
    public function __construct(
        // Dizendo que é uma coluna
        #[Column]
        public string $name
    ) {
        $this->phones = new ArrayCollection();
    }

    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

    public function phones(): iterable
    {
        return $this->phones;
    }
}

/**
 * readonly = só para leitura
 */