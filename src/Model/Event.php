<?php
namespace Model;

class Event
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var \DateTime
     */
    private $date;
    /**
     * @var string
     */
    private $comment;
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return new \DateTime($this->date);
    }
    /**
     * @param \DateTime $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }
    /**
     * @return string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }
    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }
}
