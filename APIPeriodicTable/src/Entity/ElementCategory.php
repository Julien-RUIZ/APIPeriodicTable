<?php

namespace App\Entity;

use App\Repository\ElementCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ElementCategoryRepository::class)]
class ElementCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['ApiElementTotal'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $definition = null;

    #[ORM\Column(length: 255)]
    private ?string $color = null;

    /**
     * @var Collection<int, Element>
     */
    #[ORM\OneToMany(targetEntity: Element::class, mappedBy: 'ElementCategory')]
    private Collection $Elements;

    public function __construct()
    {
        $this->Elements = new ArrayCollection();
    }

    /**
     * @var Collection<int, Element>
     */

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

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

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

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
            $Elements->setELementCategory($this);
        }

        return $this;
    }

    public function removeElements(Element $Elements): static
    {
        if ($this->Elements->removeElement($Elements)) {
            // set the owning side to null (unless already changed)
            if ($Elements->getElementCategory() === $this) {
                $Elements->setElementCategory(null);
            }
        }

        return $this;
    }


}
