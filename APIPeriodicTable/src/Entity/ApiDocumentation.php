<?php

namespace App\Entity;

use App\Repository\ApiDocumentationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiDocumentationRepository::class)]
class ApiDocumentation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 1000)]
    private ?string $Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ExampleRequest1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ExampleRequest2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ExampleRequest3 = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $ExampleResponse = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $Attributes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Endpoint1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Endpoint2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Endpoint3 = null;

    #[ORM\Column(length: 255)]
    private ?string $Anchor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getExampleRequest1(): ?string
    {
        return $this->ExampleRequest1;
    }

    public function setExampleRequest1(?string $ExampleRequest1): static
    {
        $this->ExampleRequest1 = $ExampleRequest1;

        return $this;
    }

    public function getExampleRequest2(): ?string
    {
        return $this->ExampleRequest2;
    }

    public function setExampleRequest2(?string $ExampleRequest2): static
    {
        $this->ExampleRequest2 = $ExampleRequest2;

        return $this;
    }

    public function getExampleRequest3(): ?string
    {
        return $this->ExampleRequest3;
    }

    public function setExampleRequest3(?string $ExampleRequest3): static
    {
        $this->ExampleRequest3 = $ExampleRequest3;

        return $this;
    }

    public function getExampleResponse(): ?string
    {
        return $this->ExampleResponse;
    }

    public function setExampleResponse(?string $ExampleResponse): static
    {
        $this->ExampleResponse = $ExampleResponse;

        return $this;
    }

    public function getAttributes(): ?string
    {
        return $this->Attributes;
    }

    public function setAttributes(?string $Attributes): static
    {
        $this->Attributes = $Attributes;

        return $this;
    }

    public function getEndpoint1(): ?string
    {
        return $this->Endpoint1;
    }

    public function setEndpoint1(?string $Endpoint1): static
    {
        $this->Endpoint1 = $Endpoint1;

        return $this;
    }

    public function getEndpoint2(): ?string
    {
        return $this->Endpoint2;
    }

    public function setEndpoint2(?string $Endpoint2): static
    {
        $this->Endpoint2 = $Endpoint2;

        return $this;
    }

    public function getEndpoint3(): ?string
    {
        return $this->Endpoint3;
    }

    public function setEndpoint3(?string $Endpoint3): static
    {
        $this->Endpoint3 = $Endpoint3;

        return $this;
    }

    public function getAnchor(): ?string
    {
        return $this->Anchor;
    }

    public function setAnchor(string $Anchor): static
    {
        $this->Anchor = $Anchor;

        return $this;
    }
}