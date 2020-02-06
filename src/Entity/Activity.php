<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityRepository")
 */
class Activity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="boolean", options={"default":"0"})
     */
    private $popular;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActivityCategoryLink", mappedBy="activity")
     */
    private $category_links;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActivityImagesLink", mappedBy="activity")
     */
    private $images_links;

    /**
     * Activity constructor
     */
    public function __construct()
    {
        $this->category_links = new ArrayCollection();
        $this->images_links = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return self
     */
    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPopular(): ?bool
    {
        return $this->popular;
    }

    /**
     * @param bool $popular
     * @return self
     */
    public function setPopular(bool $popular): self
    {
        $this->popular = $popular;

        return $this;
    }

    /**
     * @return Collection|ActivityCategoryLink[]
     */
    public function getCategoryLinks(): Collection
    {
        return $this->category_links;
    }

    public function addCategoryLink(ActivityCategoryLink $category_link): self
    {
        if (!$this->category_links->contains($category_link)) {
            $this->category_links[] = $category_link;
            $category_link->setActivity($this);
        }

        return $this;
    }

    public function removeCategoryLink(ActivityCategoryLink $category_link): self
    {
        if ($this->category_links->contains($category_link)) {
            $this->category_links->removeElement($category_link);
            // set the owning side to null (unless already changed)
            if ($category_link->getActivity() === $this) {
                $category_link->setActivity(null);
            }
        }
    }

    /**
     * @return Collection|ActivityImagesLink[]
     */
    public function getImagesLinks(): Collection
    {
        return $this->images_links;
    }

    /**
     * @param ActivityImagesLink $image_link
     * @return self
     */
    public function addImageLink(ActivityImagesLink $image_link): self
    {
        if (!$this->images_links->contains($image_link)) {
            $this->images_links[] = $image_link;
            $image_link->setActivity($this);
        }

        return $this;
    }

    /**
     * @param ActivityImagesLink $image_link
     * @return self
     */
    public function removeImageLink(ActivityImagesLink $image_link): self
    {
        if ($this->images_links->contains($image_link)) {
            $this->images_links->removeElement($image_link);
            // set the owning side to null (unless already changed)
            if ($image_link->getActivity() === $this) {
                $image_link->setActivity(null);
            }
        }

        return $this;
    }
}
