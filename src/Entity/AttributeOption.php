<?php

namespace App\Entity;

use App\Repository\AttributeOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttributeOptionRepository::class)]
class AttributeOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $attribute_option_name = null;

    #[ORM\ManyToOne(inversedBy: 'attributeOptions')]
    private ?AttributeType $attribute_type = null;

    /**
     * @var Collection<int, Product>
     */
    #[ORM\ManyToMany(targetEntity: Product::class, mappedBy: 'attribute')]
    private Collection $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAttributeOptionName(): ?string
    {
        return $this->attribute_option_name;
    }

    public function setAttributeOptionName(string $attribute_option_name): static
    {
        $this->attribute_option_name = $attribute_option_name;

        return $this;
    }

    public function getAttributeType(): ?AttributeType
    {
        return $this->attribute_type;
    }

    public function setAttributeType(?AttributeType $attribute_type): static
    {
        $this->attribute_type = $attribute_type;

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
            $product->addAttribute($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        if ($this->products->removeElement($product)) {
            $product->removeAttribute($this);
        }

        return $this;
    }
}
