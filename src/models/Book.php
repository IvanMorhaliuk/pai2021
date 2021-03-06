<?php

class Book implements JsonSerializable
{

    private string $title;
    private string $description;
    private string $coverSrc;
    private string $date;
    private string $contentHTML;
    private $id;



    public function __construct(string $title,string $description,string $coverSrc,string $date,string $content, $id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->coverSrc = $coverSrc;
        $this->date = $date;
        $this->contentHTML = $content;
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getContentHTML(): string
    {
        return $this->contentHTML;
    }

    public function setContentHTML($contentHTML): void
    {
        $this->contentHTML = $contentHTML;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCoverSrc(): string
    {
        return $this->coverSrc;
    }

    public function setCoverSrc(string $coverSrc): void
    {
        $this->coverSrc = $coverSrc;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'date' => $this->date,
            'description' => $this->description,
            'coverSrc' => $this->coverSrc,
            'content' => $this->contentHTML,
        ];
    }
}