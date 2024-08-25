<?php

namespace App\Entity;

use App\Repository\AtomCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtomCategoryRepository::class)]
class AtomCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $definition = null;

    #[ORM\Column(length: 255)]
    private ?string $color = null;

    /**
     * @var Collection<int, Atome>
     */
    #[ORM\OneToMany(targetEntity: Atome::class, mappedBy: 'atomCategory')]
    private Collection $atomes;

    public function __construct()
    {
        $this->atomes = new ArrayCollection();
    }

    /**
     * @var Collection<int, Atome>
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
     * @return Collection<int, Atome>
     */
    public function getAtomes(): Collection
    {
        return $this->atomes;
    }

    public function addAtome(Atome $atome): static
    {
        if (!$this->atomes->contains($atome)) {
            $this->atomes->add($atome);
            $atome->setAtomCategory($this);
        }

        return $this;
    }

    public function removeAtome(Atome $atome): static
    {
        if ($this->atomes->removeElement($atome)) {
            // set the owning side to null (unless already changed)
            if ($atome->getAtomCategory() === $this) {
                $atome->setAtomCategory(null);
            }
        }

        return $this;
    }


}
