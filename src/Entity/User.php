<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $surname;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Video", mappedBy="user_id")
     */
    private $video_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photo", mappedBy="user_id")
     */
    private $photo_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="user_id")
     */
    private $article_id;

    public function __construct()
    {
        $this->video_id = new ArrayCollection();
        $this->photo_id = new ArrayCollection();
        $this->article_id = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getActivation(): ?bool
    {
        return $this->activation;
    }

    public function setActivation(bool $activation): self
    {
        $this->activation = $activation;

        return $this;
    }

    /**
     * @return Collection|Video[]
     */
    public function getVideoId(): Collection
    {
        return $this->video_id;
    }

    public function addVideoId(Video $videoId): self
    {
        if (!$this->video_id->contains($videoId)) {
            $this->video_id[] = $videoId;
            $videoId->setUserId($this);
        }

        return $this;
    }

    public function removeVideoId(Video $videoId): self
    {
        if ($this->video_id->contains($videoId)) {
            $this->video_id->removeElement($videoId);
            // set the owning side to null (unless already changed)
            if ($videoId->getUserId() === $this) {
                $videoId->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhotoId(): Collection
    {
        return $this->photo_id;
    }

    public function addPhotoId(Photo $photoId): self
    {
        if (!$this->photo_id->contains($photoId)) {
            $this->photo_id[] = $photoId;
            $photoId->setUserId($this);
        }

        return $this;
    }

    public function removePhotoId(Photo $photoId): self
    {
        if ($this->photo_id->contains($photoId)) {
            $this->photo_id->removeElement($photoId);
            // set the owning side to null (unless already changed)
            if ($photoId->getUserId() === $this) {
                $photoId->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticleId(): Collection
    {
        return $this->article_id;
    }

    public function addArticleId(Article $articleId): self
    {
        if (!$this->article_id->contains($articleId)) {
            $this->article_id[] = $articleId;
            $articleId->setUserId($this);
        }

        return $this;
    }

    public function removeArticleId(Article $articleId): self
    {
        if ($this->article_id->contains($articleId)) {
            $this->article_id->removeElement($articleId);
            // set the owning side to null (unless already changed)
            if ($articleId->getUserId() === $this) {
                $articleId->setUserId(null);
            }
        }

        return $this;
    }
}
