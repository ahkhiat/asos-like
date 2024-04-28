<?php

namespace App\Entity;

use App\Repository\ColourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColourRepository::class)]
class Colour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $colour_name = null;

    /**
     * @var Collection<int, ProductItem>
     */
    #[ORM\OneToMany(targetEntity: ProductItem::class, mappedBy: 'colour')]
    private Collection $productItems;

    public function __construct()
    {
        $this->productItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColourName(): ?string
    {
        return $this->colour_name;
    }

    public function setColourName(string $colour_name): static
    {
        $this->colour_name = $colour_name;

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
            $productItem->setColour($this);
        }

        return $this;
    }

    public function removeProductItem(ProductItem $productItem): static
    {
        if ($this->productItems->removeElement($productItem)) {
            // set the owning side to null (unless already changed)
            if ($productItem->getColour() === $this) {
                $productItem->setColour(null);
            }
        }

        return $this;
    }
}
