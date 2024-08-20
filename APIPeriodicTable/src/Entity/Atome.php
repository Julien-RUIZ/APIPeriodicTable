<?php

namespace App\Entity;

use App\Repository\AtomeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtomeRepository::class)]
class Atome
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 13, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 13, nullable: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $electron = null;

    #[ORM\Column(nullable: true)]
    private ?int $numero = null;

    #[ORM\Column(length: 6)]
    private ?string $symbole = null;

    #[ORM\Column(length: 10)]
    private ?string $infoGroupe = null;

    #[ORM\Column(length: 10)]
    private ?string $infoPeriode = null;

    #[ORM\Column(length: 10)]
    private ?string $infoBloc = null;

    #[ORM\Column(length: 255)]
    private ?string $masseVolumique = null;

    #[ORM\Column(length: 255)]
    private ?string $cas = null;

    #[ORM\Column(length: 255)]
    private ?string $einecs = null;

    #[ORM\Column(length: 255)]
    private ?string $masseAtomique = null;

    #[ORM\Column(length: 255)]
    private ?string $rayonAtomique = null;

    #[ORM\Column(length: 255)]
    private ?string $rayonDeCovalence = null;

    #[ORM\Column(length: 255)]
    private ?string $rayonDeVanDerWaals = null;

    #[ORM\Column(length: 255)]
    private ?string $configurationElectronique = null;

    #[ORM\Column(length: 255)]
    private ?string $etatOxydation = null;

    #[ORM\Column(length: 255)]
    private ?string $decouverteAnnee = null;

    #[ORM\Column(length: 255)]
    private ?string $decouverteNoms = null;

    #[ORM\Column(length: 255)]
    private ?string $decouvertePays = null;

    #[ORM\Column(length: 255)]
    private ?string $electronegativite = null;

    #[ORM\Column(length: 255)]
    private ?string $pointDeFusion = null;

    #[ORM\Column(length: 255)]
    private ?string $pointDEbullition = null;

    #[ORM\Column]
    private ?bool $is_radioactif = null;

    #[ORM\Column(length: 255)]
    private ?string $famille = null;

    #[ORM\Column(length: 255)]
    private ?string $infoAtome = null;

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

    public function getInfoGroupe(): ?string
    {
        return $this->infoGroupe;
    }

    public function setInfoGroupe(string $infoGroupe): static
    {
        $this->infoGroupe = $infoGroupe;

        return $this;
    }

    public function getInfoPeriode(): ?string
    {
        return $this->infoPeriode;
    }

    public function setInfoPeriode(string $infoPeriode): static
    {
        $this->infoPeriode = $infoPeriode;

        return $this;
    }

    public function getInfoBloc(): ?string
    {
        return $this->infoBloc;
    }

    public function setInfoBloc(string $infoBloc): static
    {
        $this->infoBloc = $infoBloc;

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

    public function isRadioactif(): ?bool
    {
        return $this->is_radioactif;
    }

    public function setRadioactif(bool $is_radioactif): static
    {
        $this->is_radioactif = $is_radioactif;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(string $famille): static
    {
        $this->famille = $famille;

        return $this;
    }

    public function getInfoAtome(): ?string
    {
        return $this->infoAtome;
    }

    public function setInfoAtome(string $infoAtome): static
    {
        $this->infoAtome = $infoAtome;

        return $this;
    }
}
