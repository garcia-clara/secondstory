<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\Column]
    private ?float $offerprice = null;

    #[ORM\Column]
    private ?float $originalprice = null;

    #[ORM\Column(length: 255)]
    private ?string $series = null;

    #[ORM\Column(length: 255)]
    private ?string $state = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $ulpoaddate = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column(length: 255)]
    private ?string $editor = null;

    #[ORM\Column]
    private ?int $volumes = null;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function getOfferprice(): ?float
    {
        return $this->offerprice;
    }

    public function setOfferprice(float $offerprice): static
    {
        $this->offerprice = $offerprice;

        return $this;
    }

    public function getOriginalprice(): ?float
    {
        return $this->originalprice;
    }

    public function setOriginalprice(float $originalprice): static
    {
        $this->originalprice = $originalprice;

        return $this;
    }

    public function getSeries(): ?string
    {
        return $this->series;
    }

    public function setSeries(string $series): static
    {
        $this->series = $series;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getUlpoaddate(): ?\DateTimeInterface
    {
        return $this->ulpoaddate;
    }

    public function setUlpoaddate(\DateTimeInterface $ulpoaddate): static
    {
        $this->ulpoaddate = $ulpoaddate;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getEditor(): ?string
    {
        return $this->editor;
    }

    public function setEditor(string $editor): static
    {
        $this->editor = $editor;

        return $this;
    }

    public function getVolumes(): ?int
    {
        return $this->volumes;
    }

    public function setVolumes(int $volumes): static
    {
        $this->volumes = $volumes;

        return $this;
    }
}
