<?php

namespace App\Entity;

use App\Repository\ProductCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductCategoryRepository::class)]
class ProductCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category_name = null;

    #[ORM\Column(length: 255)]
    private ?string $category_image = null;

    #[ORM\Column(length: 255)]
    private ?string $category_description = null;

    /**
     * @var Collection<int, Product>
     */
    #[ORM\OneToMany(targetEntity: Product::class, mappedBy: 'product_category')]
    private Collection $products;

    #[ORM\ManyToOne(inversedBy: 'productCategories')]
    private ?SizeCategory $size_category = null;

    #[ORM\ManyToOne(inversedBy: 'productCategories')]
    private ?ProductGender $product_gender = null;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    public function setCategoryName(string $category_name): static
    {
        $this->category_name = $category_name;

        return $this;
    }

    public function getCategoryImage(): ?string
    {
        return $this->category_image;
    }

    public function setCategoryImage(string $category_image): static
    {
        $this->category_image = $category_image;

        return $this;
    }

    public function getCategoryDescription(): ?string
    {
        return $this->category_description;
    }

    public function setCategoryDescription(string $category_description): static
    {
        $this->category_description = $category_description;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setProductCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getProductCategory() === $this) {
                $product->setProductCategory(null);
            }
        }

        return $this;
    }

    public function getSizeCategory(): ?SizeCategory
    {
        return $this->size_category;
    }

    public function setSizeCategory(?SizeCategory $size_category): static
    {
        $this->size_category = $size_category;

        return $this;
    }

    public function getProductGender(): ?ProductGender
    {
        return $this->product_gender;
    }

    public function setProductGender(?ProductGender $product_gender): static
    {
        $this->product_gender = $product_gender;

        return $this;
    }
}
