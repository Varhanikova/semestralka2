<?php

declare(strict_types=1);
class Concert
{
private string $date;
private string $city;
private string $club;

    public function __construct($date, $city, $club)
    {
        $this->date = $date;
        $this->city = $city;
        $this->club = $club;
    }

    public function getDate() : string
    {
        return $this->date;
    }

    public function getCity() : string
    {
        return $this->city;
    }

    public function getClub() : string
    {
        return $this->club;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @param string $club
     */
    public function setClub(string $club): void
    {
        $this->club = $club;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }
}