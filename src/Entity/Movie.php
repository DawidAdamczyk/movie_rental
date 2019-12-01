<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MovieRepository")
 */
class Movie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $genre;

    /**
     * @ORM\Column(type="integer")
     */
    private $viewer_age;

    /**
     * @ORM\Column(type="datetime")
     */
    private $premiere;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $director;

    /**
     * @ORM\Column(type="binary", nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="smallint")
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price_day;

    /**
     * @ORM\Column(type="float")
     */
    private $price_seanse;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Loan", mappedBy="movie", orphanRemoval=true)
     */
    private $loans;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $sale_price_day;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $sale_price_seanse;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Favorite", mappedBy="movie", orphanRemoval=true)
     */
    private $favorites;

    public function __construct()
    {
        $this->loans = new ArrayCollection();
        $this->favorites = new ArrayCollection();
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

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getViewerAge(): ?int
    {
        return $this->viewer_age;
    }

    public function setViewerAge(int $viewer_age): self
    {
        $this->viewer_age = $viewer_age;

        return $this;
    }

    public function getPremiere(): ?\DateTimeInterface
    {
        return $this->premiere;
    }

    public function setPremiere(\DateTimeInterface $premiere): self
    {
        $this->premiere = $premiere;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPriceDay(): ?float
    {
        return $this->price_day;
    }

    public function setPriceDay(float $price_day): self
    {
        $this->price_day = $price_day;

        return $this;
    }

    public function getPriceSeanse(): ?float
    {
        return $this->price_seanse;
    }

    public function setPriceSeanse(float $price_seanse): self
    {
        $this->price_seanse = $price_seanse;

        return $this;
    }

    /**
     * @return Collection|Loan[]
     */
    public function getLoans(): Collection
    {
        return $this->loans;
    }

    public function addLoan(Loan $loan): self
    {
        if (!$this->loans->contains($loan)) {
            $this->loans[] = $loan;
            $loan->setMovie($this);
        }

        return $this;
    }

    public function removeLoan(Loan $loan): self
    {
        if ($this->loans->contains($loan)) {
            $this->loans->removeElement($loan);
            // set the owning side to null (unless already changed)
            if ($loan->getMovie() === $this) {
                $loan->setMovie(null);
            }
        }

        return $this;
    }

    public function getSalePriceDay(): ?float
    {
        return $this->sale_price_day;
    }

    public function setSalePriceDay(?float $sale_price_day): self
    {
        $this->sale_price_day = $sale_price_day;

        return $this;
    }

    public function getSalePriceSeanse(): ?float
    {
        return $this->sale_price_seanse;
    }

    public function setSalePriceSeanse(?float $sale_price_seanse): self
    {
        $this->sale_price_seanse = $sale_price_seanse;

        return $this;
    }

    /**
     * @return Collection|Favorite[]
     */
    public function getFavorites(): Collection
    {
        return $this->favorites;
    }

    public function addFavorite(Favorite $favorite): self
    {
        if (!$this->favorites->contains($favorite)) {
            $this->favorites[] = $favorite;
            $favorite->setMovie($this);
        }

        return $this;
    }

    public function removeFavorite(Favorite $favorite): self
    {
        if ($this->favorites->contains($favorite)) {
            $this->favorites->removeElement($favorite);
            // set the owning side to null (unless already changed)
            if ($favorite->getMovie() === $this) {
                $favorite->setMovie(null);
            }
        }

        return $this;
    }
}
