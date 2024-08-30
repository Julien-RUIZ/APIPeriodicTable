<?php

namespace App\Entity;

use App\Repository\ElementGroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ElementGroupeRepository::class)]
class ElementGroupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['ApiElementTotal'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['ApiElementTotal'])]
    private ?string $groupN = null;

    #[ORM\Column(length: 1000)]
    private ?string $definition = null;

    /**
     * @var Collection<int, Element>
     */
    #[ORM\OneToMany(targetEntity: Element::class, mappedBy: 'ElementGroupe')]
    private Collection $Elements;

    public function __construct()
    {
        $this->Elements = new ArrayCollection();
    }

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

    public function getGroupN(): ?string
    {
        return $this->groupN;
    }

    public function setGroupN(string $groupN): static
    {
        $this->groupN = $groupN;

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

    /**
     * @return Collection<int, Element>
     */
    public function getElements(): Collection
    {
        return $this->Elements;
    }

    public function addElements(Element $Elements): static
    {
        if (!$this->Elements->contains($Elements)) {
            $this->Elements->add($Elements);
            $Elements->setAtomGroupe($this);
        }

        return $this;
    }

    public function removeElements(Element $Elements): static
    {
        if ($this->Elements->removeElement($Elements)) {
            // set the owning side to null (unless already changed)
            if ($Elements->getAtomGroupe() === $this) {
                $Elements->setAtomGroupe(null);
            }
        }

        return $this;
    }
}
