<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityCategoryLinkRepository")
 */
class ActivityCategoryLink
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Activity", inversedBy="category_links")
     */
    private $activity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ActivityCategory", inversedBy="category_links")
     */
    private $category;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Activity|null
     */
    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    /**
     * @param Activity|null $activity
     * @return self
     */
    public function setActivity(?Activity $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * @return ActivityCategory|null
     */
    public function getCategory(): ?ActivityCategory
    {
        return $this->category;
    }

    /**
     * @param ActivityCategory|null $category
     * @return self
     */
    public function setCategory(?ActivityCategory $category): self
    {
        $this->category = $category;

        return $this;
    }
}
