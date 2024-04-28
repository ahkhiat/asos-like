<?php

namespace App\Entity;

use App\Repository\SizeOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SizeOptionRepository::class)]
class SizeOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $size_name = null;

    #[ORM\Column(length: 255)]
    private ?string $size_order = null;

    #[ORM\ManyToOne(inversedBy: 'sizeOptions')]
    private ?SizeCategory $size_category = null;

    /**
     * @var Collection<int, ProductVariation>
     */
    #[ORM\OneToMany(targetEntity: ProductVariation::class, mappedBy: 'size')]
    private Collection $productVariations;

    public function __construct()
    {
        $this->productVariations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSizeName(): ?string
    {
        return $this->size_name;
    }

    public function setSizeName(string $size_name): static
    {
        $this->size_name = $size_name;

        return $this;
    }

    public function getSizeOrder(): ?string
    {
        return $this->size_order;
    }

    public function setSizeOrder(string $size_order): static
    {
        $this->size_order = $size_order;

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

    /**
     * @return Collection<int, ProductVariation>
     */
    public function getProductVariations(): Collection
    {
        return $this->productVariations;
    }

    public function addProductVariation(ProductVariation $productVariation): static
    {
        if (!$this->productVariations->contains($productVariation)) {
            $this->productVariations->add($productVariation);
            $productVariation->setSize($this);
        }

        return $this;
    }

    public function removeProductVariation(ProductVariation $productVariation): static
    {
        if ($this->productVariations->removeElement($productVariation)) {
            // set the owning side to null (unless already changed)
            if ($productVariation->getSize() === $this) {
                $productVariation->setSize(null);
            }
        }

        return $this;
    }
}
