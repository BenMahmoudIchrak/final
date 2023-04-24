<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\LivraisonRepository;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\User;
use App\Entity\Pointderelais;
use Doctrine\DBAL\Types\Types;


#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idLivraison = null;



    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message:"date est requis")]
    private ?\DateTimeInterface $dateLivraison = null;


    
     #[ORM\Column]
     #[Assert\Positive(message:"Le prix doit etre un nombre positive")]
    private ?float $prixLivraison = null;

    
      #[ORM\Column( length :255 )]
      #[Assert\NotBlank(message:"Le champ texte doit contenir au moins 10 caractères")]
      private ?string $adresseLivraison = null;


      #[ORM\ManyToOne(inversedBy: 'livraisons')]
      #[ORM\JoinColumn(name: "fk_id_livreur", referencedColumnName: "id")]

      private ?User $fkIdLivreur = null;
    

      #[ORM\ManyToOne(inversedBy: 'livraisons')]
      #[ORM\JoinColumn(name:"fk_id_pointderelais", referencedColumnName: "id_pointderelais")]
      private ?Pointderelais $fkIdPointderelais = null;


    public function getIdLivraison(): ?int
    {
        return $this->idLivraison;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->dateLivraison;
    }

    public function setDateLivraison(\DateTimeInterface $dateLivraison): self
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    public function getPrixLivraison(): ?float
    {
        return $this->prixLivraison;
    }

    public function setPrixLivraison(float $prixLivraison): self
    {
        $this->prixLivraison = $prixLivraison;

        return $this;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->adresseLivraison;
    }

    public function setAdresseLivraison(string $adresseLivraison): self
    {
        $this->adresseLivraison = $adresseLivraison;

        return $this;
    }

    public function getFkIdLivreur(): ?User
    {
        return $this->fkIdLivreur;
    }

    public function setFkIdLivreur(?User $fkIdLivreur): self
    {
        $this->fkIdLivreur = $fkIdLivreur;

        return $this;
    }

    public function getFkIdPointderelais(): ?Pointderelais
    {
        return $this->fkIdPointderelais;
    }

    public function setFkIdPointderelais(?Pointderelais $fkIdPointderelais): self
    {
        $this->fkIdPointderelais = $fkIdPointderelais;

        return $this;
    }

}