<?php

namespace App\Entity;

use App\Repository\ProductImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductImageRepository::class)]
class ProductImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $image_name = null;

    #[ORM\ManyToOne(inversedBy: 'productImages')]
    private ?ProductItem $product_item = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageName(): ?string
    {
        return $this->image_name;
    }

    public function setImageName(string $image_name): static
    {
        $this->image_name = $image_name;

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
}
