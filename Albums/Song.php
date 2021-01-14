<?php

declare(strict_types=1);

class Song
{
    private string $name;
    private string $text;
    private string $album;

    public function __construct($name,$text,$album)
    {
        $this->name=$name;
        $this->text=$text;
        $this->album=$album;
    }
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAlbum(): string
    {
        return $this->album;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $album
     */
    public function setAlbum(string $album): void
    {
        $this->album = $album;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

}