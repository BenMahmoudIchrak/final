<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FeedbackRepository::class)]
class Feedback
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    
    private ?int $idFeedbackp = null;

    /**
     * @var bool
     *
     * @ORM\Column(name="favorisP", type="boolean", nullable=false)
     */
    private $favorisp;

    /**
     * @var int
     *
     * @ORM\Column(name="fk_id_userP", type="integer", nullable=false)
     */
    private $fkIdUserp;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_id_produit", referencedColumnName="id_produit")
     * })
     */
    private $fkIdProduit;

    public function getIdFeedbackp(): ?int
    {
        return $this->idFeedbackp;
    }

    public function isFavorisp(): ?bool
    {
        return $this->favorisp;
    }

    public function setFavorisp(bool $favorisp): self
    {
        $this->favorisp = $favorisp;

        return $this;
    }

    public function getFkIdUserp(): ?int
    {
        return $this->fkIdUserp;
    }

    public function setFkIdUserp(int $fkIdUserp): self
    {
        $this->fkIdUserp = $fkIdUserp;

        return $this;
    }

    public function getFkIdProduit(): ?Produit
    {
        return $this->fkIdProduit;
    }

    public function setFkIdProduit(?Produit $fkIdProduit): self
    {
        $this->fkIdProduit = $fkIdProduit;

        return $this;
    }


}
