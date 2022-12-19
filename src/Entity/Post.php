<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    #[ORM\GeneratedValue('NONE')]
    #[Groups([GroupName::READ, GroupName::FILTERABLE])]
    private Uuid $id;

    #[ORM\ManyToOne(targetEntity: Author::class)]
    #[Groups([GroupName::READ,  GroupName::FILTERABLE])]
    private Author $author;

    #[ORM\Column(length: 255)]
    #[Groups([GroupName::READ, GroupName::FILTERABLE])]
    private string $title;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups([GroupName::READ,  GroupName::FILTERABLE])]
    private string $description;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(length: 255)]
    #[Groups([GroupName::READ, GroupName::WRITE, GroupName::FILTERABLE])]
    private ?string $imageUrl = null;

    public function __construct(
        Uuid $id,
        Author $author,
    ) {
        $this->id = $id;
        $this->title = '';
        $this->author = $author;
        $this->description = '';
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function setAuthor(Author $author): Post
    {
        $this->author = $author;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }
}
