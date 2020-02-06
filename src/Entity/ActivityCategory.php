<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityCategoryRepository")
 */
class ActivityCategory
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
     * @ORM\OneToMany(targetEntity="App\Entity\ActivityCategoryLink", mappedBy="category")
     */
    private $category_links;

    /**
     * ActivityCategory constructor.
     */
    public function __construct()
    {
        $this->category_links = new ArrayCollection();
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
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|ActivityCategoryLink[]
     */
    public function getCategoryLinks(): Collection
    {
        return $this->category_links;
    }

    /**
     * @param ActivityCategoryLink $category_link
     * @return self
     */
    public function addCategoryLink(ActivityCategoryLink $category_link): self
    {
        if (!$this->category_links->contains($category_link)) {
            $this->category_links[] = $category_link;
            $category_link->setCategory($this);
        }

        return $this;
    }

    /**
     * @param ActivityCategoryLink $category_link
     * @return self
     */
    public function removeCategoryLink(ActivityCategoryLink $category_link): self
    {
        if ($this->category_links->contains($category_link)) {
            $this->category_links->removeElement($category_link);
            // set the owning side to null (unless already changed)
            if ($category_link->getCategory() === $this) {
                $category_link->setCategory(null);
            }
        }

        return $this;
    }
}
