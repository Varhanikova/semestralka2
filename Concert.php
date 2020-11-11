<?php


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
}