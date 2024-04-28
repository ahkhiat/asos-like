<?php

namespace App\Entity;

use App\Repository\AttributeTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttributeTypeRepository::class)]
class AttributeType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $attribute_name = null;

    /**
     * @var Collection<int, AttributeOption>
     */
    #[ORM\OneToMany(targetEntity: AttributeOption::class, mappedBy: 'attribute_type')]
    private Collection $attributeOptions;

    public function __construct()
    {
        $this->attributeOptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAttributeName(): ?string
    {
        return $this->attribute_name;
    }

    public function setAttributeName(string $attribute_name): static
    {
        $this->attribute_name = $attribute_name;

        return $this;
    }

    /**
     * @return Collection<int, AttributeOption>
     */
    public function getAttributeOptions(): Collection
    {
        return $this->attributeOptions;
    }

    public function addAttributeOption(AttributeOption $attributeOption): static
    {
        if (!$this->attributeOptions->contains($attributeOption)) {
            $this->attributeOptions->add($attributeOption);
            $attributeOption->setAttributeType($this);
        }

        return $this;
    }

    public function removeAttributeOption(AttributeOption $attributeOption): static
    {
        if ($this->attributeOptions->removeElement($attributeOption)) {
            // set the owning side to null (unless already changed)
            if ($attributeOption->getAttributeType() === $this) {
                $attributeOption->setAttributeType(null);
            }
        }

        return $this;
    }
}
