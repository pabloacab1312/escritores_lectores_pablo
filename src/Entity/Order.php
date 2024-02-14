<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'orders')]
class Order
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer', name :'CodOrd')]
    #[ORM\GeneratedValue]
    private $codord;

    #[ORM\Column(type: 'datetime', name :'Date')]

    private $date;

    #[ORM\Column(type: 'integer', name :'Sent')]

    private $sent;

    #[ORM\ManyToOne(targetEntity: Restaurant::class)]
    #[ORM\JoinColumn(name: "Restaurant", referencedColumnName: "CodRes"   )]
    private $restaurant;

    public function getCodord(): ?int
    {
        return $this->codord;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSent(): ?int
    {
        return $this->sent;
    }

    public function setSent(int $sent): self
    {
        $this->sent = $sent;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }


}
