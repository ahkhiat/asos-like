<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $product_name = null;

    #[ORM\Column(length: 255)]
    private ?string $product_description = null;

    #[ORM\Column(length: 255)]
    private ?string $model_height = null;

    #[ORM\Column(length: 255)]
    private ?string $model_wearing = null;

    #[ORM\Column(length: 255)]
    private ?string $care_instructions = null;

    #[ORM\Column(length: 255)]
    private ?string $about = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Brand $brand = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?ProductCategory $product_category = null;

    /**
     * @var Collection<int, ProductItem>
     */
    #[ORM\OneToMany(targetEntity: ProductItem::class, mappedBy: 'product')]
    private Collection $productItems;

    /**
     * @var Collection<int, AttributeOption>
     */
    #[ORM\ManyToMany(targetEntity: AttributeOption::class, inversedBy: 'products')]
    private Collection $attribute;

    public function __construct()
    {
        $this->productItems = new ArrayCollection();
        $this->attribute = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): static
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getProductDescription(): ?string
    {
        return $this->product_description;
    }

    public function setProductDescription(string $product_description): static
    {
        $this->product_description = $product_description;

        return $this;
    }

    public function getModelHeight(): ?string
    {
        return $this->model_height;
    }

    public function setModelHeight(string $model_height): static
    {
        $this->model_height = $model_height;

        return $this;
    }

    public function getModelWearing(): ?string
    {
        return $this->model_wearing;
    }

    public function setModelWearing(string $model_wearing): static
    {
        $this->model_wearing = $model_wearing;

        return $this;
    }

    public function getCareInstructions(): ?string
    {
        return $this->care_instructions;
    }

    public function setCareInstructions(string $care_instructions): static
    {
        $this->care_instructions = $care_instructions;

        return $this;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(string $about): static
    {
        $this->about = $about;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getProductCategory(): ?ProductCategory
    {
        return $this->product_category;
    }

    public function setProductCategory(?ProductCategory $product_category): static
    {
        $this->product_category = $product_category;

        return $this;
    }

    /**
     * @return Collection<int, ProductItem>
     */
    public function getProductItems(): Collection
    {
        return $this->productItems;
    }

    public function addProductItem(ProductItem $productItem): static
    {
        if (!$this->productItems->contains($productItem)) {
            $this->productItems->add($productItem);
            $productItem->setProduct($this);
        }

        return $this;
    }

    public function removeProductItem(ProductItem $productItem): static
    {
        if ($this->productItems->removeElement($productItem)) {
            // set the owning side to null (unless already changed)
            if ($productItem->getProduct() === $this) {
                $productItem->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AttributeOption>
     */
    public function getAttribute(): Collection
    {
        return $this->attribute;
    }

    public function addAttribute(AttributeOption $attribute): static
    {
        if (!$this->attribute->contains($attribute)) {
            $this->attribute->add($attribute);
        }

        return $this;
    }

    public function removeAttribute(AttributeOption $attribute): static
    {
        $this->attribute->removeElement($attribute);

        return $this;
    }
}
