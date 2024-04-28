<?php

namespace App\Entity;

use App\Repository\ProductItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductItemRepository::class)]
class ProductItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $original_price = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $sale_price = null;

    #[ORM\Column(length: 255)]
    private ?string $product_code = null;

    #[ORM\ManyToOne(inversedBy: 'productItems')]
    private ?Colour $colour = null;

    #[ORM\ManyToOne(inversedBy: 'productItems')]
    private ?Product $product = null;

    /**
     * @var Collection<int, ProductImage>
     */
    #[ORM\OneToMany(targetEntity: ProductImage::class, mappedBy: 'product_item')]
    private Collection $productImages;

    /**
     * @var Collection<int, ProductVariation>
     */
    #[ORM\OneToMany(targetEntity: ProductVariation::class, mappedBy: 'product_item')]
    private Collection $productVariations;

    public function __construct()
    {
        $this->productImages = new ArrayCollection();
        $this->productVariations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOriginalPrice(): ?string
    {
        return $this->original_price;
    }

    public function setOriginalPrice(string $original_price): static
    {
        $this->original_price = $original_price;

        return $this;
    }

    public function getSalePrice(): ?string
    {
        return $this->sale_price;
    }

    public function setSalePrice(string $sale_price): static
    {
        $this->sale_price = $sale_price;

        return $this;
    }

    public function getProductCode(): ?string
    {
        return $this->product_code;
    }

    public function setProductCode(string $product_code): static
    {
        $this->product_code = $product_code;

        return $this;
    }

    public function getColour(): ?Colour
    {
        return $this->colour;
    }

    public function setColour(?Colour $colour): static
    {
        $this->colour = $colour;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Collection<int, ProductImage>
     */
    public function getProductImages(): Collection
    {
        return $this->productImages;
    }

    public function addProductImage(ProductImage $productImage): static
    {
        if (!$this->productImages->contains($productImage)) {
            $this->productImages->add($productImage);
            $productImage->setProductItem($this);
        }

        return $this;
    }

    public function removeProductImage(ProductImage $productImage): static
    {
        if ($this->productImages->removeElement($productImage)) {
            // set the owning side to null (unless already changed)
            if ($productImage->getProductItem() === $this) {
                $productImage->setProductItem(null);
            }
        }

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
            $productVariation->setProductItem($this);
        }

        return $this;
    }

    public function removeProductVariation(ProductVariation $productVariation): static
    {
        if ($this->productVariations->removeElement($productVariation)) {
            // set the owning side to null (unless already changed)
            if ($productVariation->getProductItem() === $this) {
                $productVariation->setProductItem(null);
            }
        }

        return $this;
    }
}
