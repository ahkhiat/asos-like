<?php

namespace App\Entity;

use App\Repository\ProductVariationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductVariationRepository::class)]
class ProductVariation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $qty_in_stock = null;

    #[ORM\ManyToOne(inversedBy: 'productVariations')]
    private ?ProductItem $product_item = null;

    #[ORM\ManyToOne(inversedBy: 'productVariations')]
    private ?SizeOption $size = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQtyInStock(): ?int
    {
        return $this->qty_in_stock;
    }

    public function setQtyInStock(int $qty_in_stock): static
    {
        $this->qty_in_stock = $qty_in_stock;

        return $this;
    }

    public function getProductItem(): ?ProductItem
    {
        return $this->product_item;
    }

    public function setProductItem(?ProductItem $product_item): static
    {
        $this->product_item = $product_item;

        return $this;
    }

    public function getSize(): ?SizeOption
    {
        return $this->size;
    }

    public function setSize(?SizeOption $size): static
    {
        $this->size = $size;

        return $this;
    }
}
