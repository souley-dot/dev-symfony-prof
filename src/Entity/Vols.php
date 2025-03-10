<?php

namespace App\Entity;

use App\Repository\VolsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VolsRepository::class)]
class Vols
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numVol = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Villes $villeDepart = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Villes $villeArrivee = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $horaireDepart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $horaireArrivee = null;

    #[ORM\Column]
    private ?float $Prix = null;

    #[ORM\Column]
    private ?bool $reduction = null;

    #[ORM\Column]
    private ?int $Places = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function __construct(){

        $this->numVol=$this->generetor();
    }

    ////// La fonction génératrice du numéro de vol.
    public function generetor():?string{

         $letters = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2));
        $numbers = random_int(1000, 9999);
        $flightNumber = $letters . $numbers;

        return $flightNumber;

    }
    public function getNumVol(): ?string
    {
        return $this->numVol;
    }

    public function setNumVol(string $numVol): static
    {
        $this->numVol = $numVol;

        return $this;
    }

    public function getVilleDepart(): ?Villes
    {
        return $this->villeDepart;
    }

    public function setVilleDepart(?Villes $villeDepart): static
    {
        $this->villeDepart = $villeDepart;

        return $this;
    }

    public function getVilleArrivee(): ?Villes
    {
        return $this->villeArrivee;
    }

    public function setVilleArrivee(?Villes $villeArrivee): static
    {
        $this->villeArrivee = $villeArrivee;

        return $this;
    }

    public function getHoraireDepart(): ?\DateTimeInterface
    {
        return $this->horaireDepart;
    }

    public function setHoraireDepart(\DateTimeInterface $horaireDepart): static
    {
        $this->horaireDepart = $horaireDepart;

        return $this;
    }

    public function getHoraireArrivee(): ?\DateTimeInterface
    {
        return $this->horaireArrivee;
    }

    public function setHoraireArrivee(\DateTimeInterface $horaireArrivee): static
    {
        $this->horaireArrivee = $horaireArrivee;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->Prix;
    }

    public function setPrix(float $Prix): static
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function isReduction(): ?bool
    {
        return $this->reduction;
    }

    public function setReduction(bool $reduction): static
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->Places;
    }

    public function setPlaces(int $Places): static
    {
        $this->Places = $Places;

        return $this;
    }
}
