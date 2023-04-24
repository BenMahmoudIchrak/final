<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseRepository::class)]
class Reponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    
    private ?int $idReponse = null;

   #[ORM\Column( length:255)]
    
    private ?string $messageRep = null;


      #[ORM\Column(length:255)]
     
    private ?string $etat = null;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_id_admin", referencedColumnName="id")
     * })
     */
    private $fkIdAdmin;

    /**
     * @var \Reclamation
     *
     * @ORM\ManyToOne(targetEntity="Reclamation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_id_reclamation", referencedColumnName="id_rec")
     * })
     */
    private $fkIdReclamation;

    public function getIdReponse(): ?int
    {
        return $this->idReponse;
    }

    public function getMessageRep(): ?string
    {
        return $this->messageRep;
    }

    public function setMessageRep(string $messageRep): self
    {
        $this->messageRep = $messageRep;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getFkIdAdmin(): ?User
    {
        return $this->fkIdAdmin;
    }

    public function setFkIdAdmin(?User $fkIdAdmin): self
    {
        $this->fkIdAdmin = $fkIdAdmin;

        return $this;
    }

    public function getFkIdReclamation(): ?Reclamation
    {
        return $this->fkIdReclamation;
    }

    public function setFkIdReclamation(?Reclamation $fkIdReclamation): self
    {
        $this->fkIdReclamation = $fkIdReclamation;

        return $this;
    }


}
