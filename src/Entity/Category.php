<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'categories')]
class Category
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer', name :'CodCat')]
    #[ORM\GeneratedValue]
    private $codcat;

    #[ORM\Column(type: 'string', name :'Name')]
    private $name;
    #[ORM\Column(type: 'string', name :'Description')]

    private $description;
    #[ORM\OneToMany(targetEntity:"Product", mappedBy:"category")]

	private $products;
	 public function getProducts()
    {
        return $this->products;
    }
	public function setProducts($products)
    {
        $this->products = $products;
    }
	public function __construct()
    {
        $this->products = new ArrayCollection();
        
    }
    public function getCodcat(): ?int
    {
        return $this->codcat;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
