<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AffectationRepository::class)]
class Affectation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    
    private ?int $idAffectation = null;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_idcommande", referencedColumnName="id_commande")
     * })
     */
    private $fkIdcommande;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_idproduit", referencedColumnName="id_produit")
     * })
     */
    private $fkIdproduit;

    public function getIdAffectation(): ?int
    {
        return $this->idAffectation;
    }

    public function getFkIdcommande(): ?Commande
    {
        return $this->fkIdcommande;
    }

    public function setFkIdcommande(?Commande $fkIdcommande): self
    {
        $this->fkIdcommande = $fkIdcommande;

        return $this;
    }

    public function getFkIdproduit(): ?Produit
    {
        return $this->fkIdproduit;
    }

    public function setFkIdproduit(?Produit $fkIdproduit): self
    {
        $this->fkIdproduit = $fkIdproduit;

        return $this;
    }


}
