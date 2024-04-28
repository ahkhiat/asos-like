<?php

namespace App\Entity;

use App\Repository\SizeCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SizeCategoryRepository::class)]
class SizeCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category_name = null;

    /**
     * @var Collection<int, ProductCategory>
     */
    #[ORM\OneToMany(targetEntity: ProductCategory::class, mappedBy: 'size_category')]
    private Collection $productCategories;

    /**
     * @var Collection<int, SizeOption>
     */
    #[ORM\OneToMany(targetEntity: SizeOption::class, mappedBy: 'size_category')]
    private Collection $sizeOptions;

    public function __construct()
    {
        $this->productCategories = new ArrayCollection();
        $this->sizeOptions = new ArrayCollection();
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
            $productCategory->setSizeCategory($this);
        }

        return $this;
    }

    public function removeProductCategory(ProductCategory $productCategory): static
    {
        if ($this->productCategories->removeElement($productCategory)) {
            // set the owning side to null (unless already changed)
            if ($productCategory->getSizeCategory() === $this) {
                $productCategory->setSizeCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SizeOption>
     */
    public function getSizeOptions(): Collection
    {
        return $this->sizeOptions;
    }

    public function addSizeOption(SizeOption $sizeOption): static
    {
        if (!$this->sizeOptions->contains($sizeOption)) {
            $this->sizeOptions->add($sizeOption);
            $sizeOption->setSizeCategory($this);
        }

        return $this;
    }

    public function removeSizeOption(SizeOption $sizeOption): static
    {
        if ($this->sizeOptions->removeElement($sizeOption)) {
            // set the owning side to null (unless already changed)
            if ($sizeOption->getSizeCategory() === $this) {
                $sizeOption->setSizeCategory(null);
            }
        }

        return $this;
    }
}
