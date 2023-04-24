<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\PointderelaisRepository;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Livraison;

#[ORM\Entity(repositoryClass: PointderelaisRepository::class)]
class Pointderelais
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idPointderelais=null;

    
    #[ORM\Column( length :255 )]
    #[Assert\NotBlank(message:"L'adresse  doit contenir au moins 10 caractères")]
    private ?string $adressePointderelais=null;

    
    #[ORM\Column( length :255 )]
    #[Assert\NotBlank(message:"La region  doit contenir au moins 5 caractères")]
    private ?string $region=null;

    #[ORM\Column]
    #[Assert\Positive(message:"L'horaire doit etre un nombre positive")]
    private ?int $horaire=null;
    
   


    #[ORM\ManyToOne(inversedBy: 'pointderelais')]
    #[ORM\JoinColumn(name: "fk_id_livraisonp", referencedColumnName: "id_livraison")]
   
    private ?Livraison $fkIdLivraisonp = null;
  

    public function getIdPointderelais(): ?int
    {
        return $this->idPointderelais;
    }


    public function getAdressePointderelais(): ?string
    {
        return $this->adressePointderelais;
    }

    public function setAdressePointderelais(String $adressePointderelais): self
    {
        $this->adressePointderelais = $adressePointderelais;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region= $region;

        return $this;
    }

    public function getHoraire(): ?int
    {
        return $this->horaire;
    }

    public function setHoraire(int $horaire): self
    {
        $this->horaire= $horaire;

        return $this;
    }
    public function getFkIdLivraisonp(): ?Livraison
    {
        return $this->fkIdLivraisonp;
    }

    public function setFkIdLivraisonp(?Livraison $fkIdLivraisonp): self
    {
        $this->fkIdLivraisonp= $fkIdLivraisonp;

        return $this;
    }

}