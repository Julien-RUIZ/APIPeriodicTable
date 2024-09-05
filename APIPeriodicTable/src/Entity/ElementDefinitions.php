<?php

namespace App\Entity;

use App\Repository\ElementDefinitionsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ElementDefinitionsRepository::class)]
class ElementDefinitions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    #[Assert\Regex(pattern: '/^[A-Za-zÀ-ÿ\s]+$/u')]
    private ?string $name = null;

    #[ORM\Column(length: 1000)]
    private ?string $definition = null;

    #[ORM\Column(length: 255)]
    private ?string $namePropertyElement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDefinition(): ?string
    {
        return $this->definition;
    }

    public function setDefinition(string $definition): static
    {
        $this->definition = $definition;

        return $this;
    }

    public function getNamePropertyElement(): ?string
    {
        return $this->namePropertyElement;
    }

    public function setNamePropertyElement(string $namePropertyElement): static
    {
        $this->namePropertyElement = $namePropertyElement;

        return $this;
    }
}
