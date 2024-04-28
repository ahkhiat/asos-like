<?php

namespace App\Entity;

use App\Repository\ProductGenderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductGenderRepository::class)]
class ProductGender
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $gender_name = null;

    /**
     * @var Collection<int, ProductCategory>
     */
    #[ORM\OneToMany(targetEntity: ProductCategory::class, mappedBy: 'product_gender')]
    private Collection $productCategories;

    public function __construct()
    {
        $this->productCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenderName(): ?string
    {
        return $this->gender_name;
    }

    public function setGenderName(string $gender_name): static
    {
        $this->gender_name = $gender_name;

        return $this;
    }

    /**
     * @return Collection<int, ProductCategory>
     */
    public function getProductCategories(): Collection
    {
        return $this->productCategories;
    }

    public function addProductCategory(ProductCategory $productCategory): static
    {
        if (!$this->productCategories->contains($productCategory)) {
            $this->productCategories->add($productCategory);
            $productCategory->setProductGender($this);
        }

        return $this;
    }

    public function removeProductCategory(ProductCategory $productCategory): static
    {
        if ($this->productCategories->removeElement($productCategory)) {
            // set the owning side to null (unless already changed)
            if ($productCategory->getProductGender() === $this) {
                $productCategory->setProductGender(null);
            }
        }

        return $this;
    }
}
