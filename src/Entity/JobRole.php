<?php

namespace App\Entity;

use App\Repository\JobRoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRoleRepository::class)
 */
class JobRole
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=Department::class, mappedBy="jobRoles")
     */
    private $department;

    public function __construct()
    {
        $this->department = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, Department>
     */
    public function getDepartment(): Collection
    {
        return $this->department;
    }

    public function addDepartment(Department $department): self
    {
        if (!$this->department->contains($department)) {
            $this->department[] = $department;
            $department->setJobRoles($this);
        }

        return $this;
    }

    public function removeDepartment(Department $department): self
    {
        if ($this->department->removeElement($department)) {
            // set the owning side to null (unless already changed)
            if ($department->getJobRoles() === $this) {
                $department->setJobRoles(null);
            }
        }

        return $this;
    }
}
