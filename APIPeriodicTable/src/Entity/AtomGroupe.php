<?php

namespace App\Entity;

use App\Repository\AtomGroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtomGroupeRepository::class)]
class AtomGroupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $groupN = null;

    #[ORM\Column(length: 1000)]
    private ?string $definition = null;

    /**
     * @var Collection<int, Atome>
     */
    #[ORM\OneToMany(targetEntity: Atome::class, mappedBy: 'atomGroupe')]
    private Collection $atomes;

    public function __construct()
    {
        $this->atomes = new ArrayCollection();
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
            $atome->setAtomGroupe($this);
        }

        return $this;
    }

    public function removeAtome(Atome $atome): static
    {
        if ($this->atomes->removeElement($atome)) {
            // set the owning side to null (unless already changed)
            if ($atome->getAtomGroupe() === $this) {
                $atome->setAtomGroupe(null);
            }
        }

        return $this;
    }
}
