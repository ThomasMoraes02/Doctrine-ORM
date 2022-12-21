<?php 
namespace Alura\Doctrine\entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

// Informa ao doctrine que é uma entidade
#[Entity]
class Student
{
    // Id gerado automáticamente
    #[Id, GeneratedValue, Column]
    public int $id;

    #[ManyToMany(targetEntity:Course::class, inversedBy:"students")]
    private Collection $courses;

    #[OneToMany(targetEntity:Phone::class, mappedBy:"student", cascade:["persist"])]
    private Collection $phones;

    // Passando parâmetro e já inicializando (readonly sem setar outro valor)
    public function __construct(
        // Dizendo que é uma coluna
        #[Column]
        public string $name
    ) {
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

    /**
     * @return Collection<Phone>
     */
    public function phones(): iterable
    {
        return $this->phones;
    }

    /**
     * @return Collection<Course>
     */
    public function couses(): iterable
    {
        return $this->courses;
    }

    public function enrollInCourse(Course $course): void
    {
        if($this->courses->contains($course)) {
            return;
        }
        
        $this->courses->add($course);
        $course->addStudent($this);
    }
}

/**
 * readonly = só para leitura
 */