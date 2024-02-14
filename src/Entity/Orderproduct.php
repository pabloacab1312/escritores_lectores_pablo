<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'orderproducts')]
class Orderproduct
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer', name :'CodOrdProd')]
    #[ORM\GeneratedValue]
    private $codordprod;

    #[ORM\Column(type: 'integer', name :'Units')]

    private $units;


    #[ORM\ManyToOne(targetEntity: Order::class)]
    #[ORM\JoinColumn(name: "Orders", referencedColumnName: "CodOrd"   )] 
    private $order;

    
    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: "Product", referencedColumnName: "CodProd"   )]    
    private $product;

    public function getCodordprod(): ?int
    {
        return $this->codordprod;
    }

    public function getUnits(): ?int
    {
        return $this->units;
    }

    public function setUnits(int $units): self
    {
        $this->units = $units;

        return $this;
    }

    public function getOrder(): ?Order
    {
        return $this->order;
    }

    public function setOrder(?Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }


}
