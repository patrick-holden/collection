<?php

class Wine
{
    private int $id;
    private string $name;
    private string $blurb;
    private string $producer;
    private string $image;
    private string $region;
    private string $country;
    private array $colours;
    private array $grapes;

    /**
     * @param int $id
     * @param string $name
     * @param string $blurb
     * @param string $producer
     * @param string $image
     * @param string $region
     * @param string $country
     * @param string $colour
     * @param string $grape
     */
    public function __construct(
        int $id,
        string $name,
        string $blurb,
        string $producer,
        string $image,
        string $region,
        string $country,
        string $colour,
        string $grape)

    {
        $this->id = $id;
        $this->name = $name;
        $this->blurb = $blurb;
        $this->producer = $producer;
        $this->image = $image;
        $this->region = $region;
        $this->country = $country;
        $this->colours[] = $colour;
        $this->grapes[] = $grape;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getBlurb(): string
    {
        return $this->blurb;
    }

    /**
     * @return string
     */
    public function getProducer(): string
    {
        return $this->producer;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return array
     */
    public function getColours(): array
    {
        return $this->colours;
    }

    /**
     * @return array
     */
    public function getGrapes(): array
    {
        return $this->grapes;
    }

    public function addColour (string $colour): void
    {
        $this->colours[] = $colour;
    }

    public function addGrape (string $grape): void
    {
        $this->grapes[] = $grape;
    }
}