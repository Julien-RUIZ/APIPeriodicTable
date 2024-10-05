<?php

namespace App\Entity;

use App\Repository\ElementRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ElementRepository::class)]
class Element
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15, nullable: true)]
    #[Groups(['ApiElementTotal'])]
    private ?string $nom = null;

    #[ORM\Column(length: 15, nullable: true)]
    #[Groups(['ApiElementTotal'])]
    private ?string $slug = null;

    #[ORM\Column(length: 40)]
    #[Assert\Regex(pattern: '/^[0-9|]+$/')]
    #[Assert\Length(max: 40, maxMessage: 'Max length of {{ limit }} characters')]
    #[Groups(['ApiElementTotal'])]
    private ?string $electron = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['ApiElementTotal'])]
    private ?int $numero = null;

    #[ORM\Column(length: 4)]
    #[Groups(['ApiElementTotal'])]
    #[Assert\Length(
        max: 10,
        maxMessage: '{{ limit }} characters max',
    )]
    #[Assert\Regex(pattern: '/^[A-Z]+$/')]
    private ?string $symbole = null;

    #[ORM\Column(length: 10)]
    #[Groups(['ApiElementTotal'])]
    #[Assert\Length(
        max: 10,
        maxMessage: '{{ limit }} characters max',
    )]
    #[Assert\Regex(pattern: '/^\d+$/', message: 'Le champ doit contenir uniquement des chiffres.')]
    private ?string $groupeVertical = null;

    #[ORM\Column(length: 10)]
    #[Groups(['ApiElementTotal'])]
    #[Assert\Length(
        max: 10,
        maxMessage: '{{ limit }} characters max',
    )]
   #[Assert\Regex(pattern: '/^\d+$/', message: 'Le champ doit contenir uniquement des chiffres.')]
    private ?string $periodeHorizontal = null;

    #[ORM\Column(length: 100)]
    #[Assert\Length(max: 100, maxMessage: 'Max length of {{ limit }} characters')]
    #[Groups(['ApiElementTotal'])]
    private ?string $masseVolumique = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(max: 50, maxMessage: 'Max length of {{ limit }} characters')]
    #[Assert\Regex(pattern: '/^[a-zA-Z0-9À-ÿ\s,()-]+$/', message: 'Le champ doit contenir uniquement des lettres, des chiffres, des espaces, des virgules, des parenthèses et des tirets.')]
    #[Groups(['ApiElementTotal'])]
    private ?string $cas = null;

    #[ORM\Column(length: 100)]
    #[Assert\Length(max: 100, maxMessage: 'Max length of {{ limit }} characters')]
    #[Assert\Regex(pattern: '/^[a-zA-Z0-9-()]+$/', message: 'Le champ doit contenir uniquement des lettres, des chiffres, des tirets et des parenthèses.')]
    #[Groups(['ApiElementTotal'])]
    private ?string $einecs = null;

    #[ORM\Column(length: 20)]
    #[Assert\Regex(pattern: '/^[0-9().]+$/', message: 'Le champ doit contenir uniquement des lettres, des chiffres, des tirets et des parenthèses.')]
    #[Assert\Length(max: 20, maxMessage: 'Max length of {{ limit }} characters')]
    #[Groups(['ApiElementTotal'])]
    private ?string $masseAtomique = null;

    #[ORM\Column(length: 100)]
    #[Assert\Length(max: 100, maxMessage: 'Max length of {{ limit }} characters')]
    #[Assert\Regex(pattern: '/^[a-zA-Z0-9\s()]+$/', message: 'Le champ doit contenir uniquement des lettres, des chiffres, des espaces et des parenthèses.')]
    #[Groups(['ApiElementTotal'])]
    private ?string $rayonAtomique = null;

    #[ORM\Column(length: 20)]
    #[Assert\Length(max: 20, maxMessage: 'Max length of {{ limit }} characters')]
    #[Groups(['ApiElementTotal'])]
    private ?string $rayonDeCovalence = null;

    #[ORM\Column(length: 20)]
    #[Assert\Length(max: 20, maxMessage: 'Max length of {{ limit }} characters')]
    #[Groups(['ApiElementTotal'])]
    private ?string $rayonDeVanDerWaals = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(max: 50, maxMessage: 'Max length of {{ limit }} characters')]
    #[Groups(['ApiElementTotal'])]
    private ?string $configurationElectronique = null;

    #[ORM\Column(length: 20)]
    #[Assert\Length(max: 20, maxMessage: 'Max length of {{ limit }} characters')]
    #[Assert\Regex(pattern: '/^[\d\s\+\-±,]+$/', message: 'Le champ doit contenir uniquement des chiffres, des espaces, des signes plus, moins, ± et des virgules.'
    )]
    #[Groups(['ApiElementTotal'])]
    private ?string $etatOxydation = null;

    #[ORM\Column(length: 255)]
   #[Assert\Regex(pattern: '/^\d+$/', message: 'Le champ doit contenir uniquement des chiffres.')]
    #[Assert\Length(max: 20, maxMessage: 'Max length of {{ limit }} characters')]
    #[Groups(['ApiElementTotal'])]
    private ?string $decouverteAnnee = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(max: 255, maxMessage: 'Max length of {{ limit }} characters')]
    #[Groups(['ApiElementTotal'])]
    private ?string $decouverteNoms = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(max: 255, maxMessage: 'Max length of {{ limit }} characters')]
    #[Groups(['ApiElementTotal'])]
    private ?string $decouvertePays = null;

    #[ORM\Column(length: 10)]
    #[Assert\Length(max: 10, maxMessage: 'Max length of {{ limit }} characters')]
    #[Groups(['ApiElementTotal'])]
    private ?string $electronegativite = null;

    #[ORM\Column(length: 20)]
    #[Assert\Length(max: 20, maxMessage: 'Max length of {{ limit }} characters')]
    #[Groups(['ApiElementTotal'])]
    private ?string $pointDeFusion = null;

    #[ORM\Column(length: 20)]
    #[Assert\Length(max: 20, maxMessage: 'Max length of {{ limit }} characters')]
    #[Groups(['ApiElementTotal'])]
    private ?string $pointDEbullition = null;

    #[ORM\Column]
    #[Groups(['ApiElementTotal'])]
    private ?bool $radioactif = null;

    #[ORM\Column(length: 255)]
    private ?string $infoElement = null;

    #[ORM\ManyToOne(inversedBy: 'Elements')]
    #[Groups(['ApiElementTotal'])]
    private ?ElementCategory $elementCategory = null;

    #[ORM\ManyToOne(inversedBy: 'Elements')]
    #[Groups(['ApiElementTotal'])]
    private ?ElementGroupe $elementGroupe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getElectron(): ?string
    {
        return $this->electron;
    }

    public function setElectron(string $electron): static
    {
        $this->electron = $electron;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(?int $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getSymbole(): ?string
    {
        return $this->symbole;
    }

    public function setSymbole(string $symbole): static
    {
        $this->symbole = $symbole;

        return $this;
    }

    public function getgroupeVertical(): ?string
    {
        return $this->groupeVertical;
    }

    public function setgroupeVertical(string $groupeVertical): static
    {
        $this->groupeVertical = $groupeVertical;

        return $this;
    }

    public function getperiodeHorizontal(): ?string
    {
        return $this->periodeHorizontal;
    }

    public function setperiodeHorizontal(string $periodeHorizontal): static
    {
        $this->periodeHorizontal = $periodeHorizontal;

        return $this;
    }

    public function getMasseVolumique(): ?string
    {
        return $this->masseVolumique;
    }

    public function setMasseVolumique(string $masseVolumique): static
    {
        $this->masseVolumique = $masseVolumique;

        return $this;
    }

    public function getCas(): ?string
    {
        return $this->cas;
    }

    public function setCas(string $cas): static
    {
        $this->cas = $cas;

        return $this;
    }

    public function getEinecs(): ?string
    {
        return $this->einecs;
    }

    public function setEinecs(string $einecs): static
    {
        $this->einecs = $einecs;

        return $this;
    }

    public function getMasseAtomique(): ?string
    {
        return $this->masseAtomique;
    }

    public function setMasseAtomique(string $masseAtomique): static
    {
        $this->masseAtomique = $masseAtomique;

        return $this;
    }

    public function getRayonAtomique(): ?string
    {
        return $this->rayonAtomique;
    }

    public function setRayonAtomique(string $rayonAtomique): static
    {
        $this->rayonAtomique = $rayonAtomique;

        return $this;
    }

    public function getRayonDeCovalence(): ?string
    {
        return $this->rayonDeCovalence;
    }

    public function setRayonDeCovalence(string $rayonDeCovalence): static
    {
        $this->rayonDeCovalence = $rayonDeCovalence;

        return $this;
    }

    public function getRayonDeVanDerWaals(): ?string
    {
        return $this->rayonDeVanDerWaals;
    }

    public function setRayonDeVanDerWaals(string $rayonDeVanDerWaals): static
    {
        $this->rayonDeVanDerWaals = $rayonDeVanDerWaals;

        return $this;
    }

    public function getConfigurationElectronique(): ?string
    {
        return $this->configurationElectronique;
    }

    public function setConfigurationElectronique(string $configurationElectronique): static
    {
        $this->configurationElectronique = $configurationElectronique;

        return $this;
    }

    public function getEtatOxydation(): ?string
    {
        return $this->etatOxydation;
    }

    public function setEtatOxydation(string $etatOxydation): static
    {
        $this->etatOxydation = $etatOxydation;

        return $this;
    }

    public function getDecouverteAnnee(): ?string
    {
        return $this->decouverteAnnee;
    }

    public function setDecouverteAnnee(string $decouverteAnnee): static
    {
        $this->decouverteAnnee = $decouverteAnnee;

        return $this;
    }

    public function getDecouverteNoms(): ?string
    {
        return $this->decouverteNoms;
    }

    public function setDecouverteNoms(string $decouverteNoms): static
    {
        $this->decouverteNoms = $decouverteNoms;

        return $this;
    }

    public function getDecouvertePays(): ?string
    {
        return $this->decouvertePays;
    }

    public function setDecouvertePays(string $decouvertePays): static
    {
        $this->decouvertePays = $decouvertePays;

        return $this;
    }

    public function getElectronegativite(): ?string
    {
        return $this->electronegativite;
    }

    public function setElectronegativite(string $electronegativite): static
    {
        $this->electronegativite = $electronegativite;

        return $this;
    }

    public function getPointDeFusion(): ?string
    {
        return $this->pointDeFusion;
    }

    public function setPointDeFusion(string $pointDeFusion): static
    {
        $this->pointDeFusion = $pointDeFusion;

        return $this;
    }

    public function getPointDEbullition(): ?string
    {
        return $this->pointDEbullition;
    }

    public function setPointDEbullition(string $pointDEbullition): static
    {
        $this->pointDEbullition = $pointDEbullition;

        return $this;
    }

    public function isradioactif(): ?bool
    {
        return $this->radioactif;
    }

    public function setradioactif(bool $radioactif): static
    {
        $this->radioactif = $radioactif;

        return $this;
    }

    public function getinfoElement(): ?string
    {
        return $this->infoElement;
    }

    public function setinfoElement(string $infoElement): static
    {
        $this->infoElement = $infoElement;

        return $this;
    }

    public function getElementCategory(): ?ElementCategory
    {
        return $this->elementCategory;
    }

    public function setElementCategory(?ElementCategory $elementCategory): static
    {
        $this->elementCategory = $elementCategory;

        return $this;
    }

    public function getElementGroupe(): ?ElementGroupe
    {
        return $this->elementGroupe;
    }

    public function setElementGroupe(?ElementGroupe $elementGroupe): static
    {
        $this->elementGroupe = $elementGroupe;

        return $this;
    }

}
