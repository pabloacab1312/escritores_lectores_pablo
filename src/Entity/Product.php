<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'products')]
class Product
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer', name :'CodProd')]
    #[ORM\GeneratedValue]
    private $codprod;

    #[ORM\Column(type: 'string', name :'Name')]
    private $name = 'NULL';
    #[ORM\Column(type: 'string', name :'Description')]

    private $description;

    #[ORM\Column(type: 'float', name :'Weight')]

    private $weight;

    #[ORM\Column(type: 'integer', name :'Stock')]

    private $stock;

    #[ORM\ManyToOne(targetEntity: Category::class,  inversedBy: "products")]
    #[ORM\JoinColumn(name: "Category", referencedColumnName: "CodCat"   )]
    private $category;

    public function getCodprod(): ?int
    {
        return $this->codprod;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
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

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
    public function convertToArray(){
		$elem = ['name' => $this->name, 
				'description' => $this->description,
				'stock' => $this->stock,
				'weight' => $this->weight,
				'codprod' => $this->codprod];
		return $elem;
		
	}


}
