<?php

namespace App\Entity;

use App\Repository\TagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TagsRepository::class)]
class Tags
{
    #[Groups(['projets', 'tags'])]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['projets', 'tags'])]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, project>
     */
    #[ORM\ManyToMany(targetEntity: project::class, inversedBy: 'tags')]
    private Collection $project;

    public function __construct()
    {
        $this->project = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, project>
     */
    public function getProject(): Collection
    {
        return $this->project;
    }

    public function addProject(project $project): static
    {
        if (!$this->project->contains($project)) {
            $this->project->add($project);
        }

        return $this;
    }

    public function removeProject(project $project): static
    {
        $this->project->removeElement($project);

        return $this;
    }
}
