<?php

namespace App\Entity;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
  #[ORM\Id]
     #[ORM\GeneratedValue]
     #[ORM\Column]
     
     
    private ?int $idRec = null;

    #[ORM\Column(length : 255)]
     
    private ?string $objectif = null ;

    
      #[ORM\Column(length:255)]
     
    private ?string $text = null;

    
     #[ORM\ManyToOne(inversedBy: 'reclamations')]
    
     
    private ?User $fkIdUtilisateur = null;

    public function getIdRec(): ?int
    {
        return $this->idRec;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(string $objectif): self
    {
        $this->objectif = $objectif;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getFkIdUtilisateur(): ?User
    {
        return $this->fkIdUtilisateur;
    }

    public function setFkIdUtilisateur(?User $fkIdUtilisateur): self
    {
        $this->fkIdUtilisateur = $fkIdUtilisateur;

        return $this;
    }


}
