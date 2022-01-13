<?php
class Book
{
    private int $id;
    private string $title;
    private string $author;
    private string $summary;
    private string $release_date;
    private string $category;
    private bool $for_child;
    private bool $available;
    private ?int $client_id;

    public function __construct(?array $data = array())
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    public function showBookInfo(): string
    {
        return "
        <tr>
            <td>" . $this->id . "</td>
            <td>" . $this->title . "</td>
            <td>" . $this->author . "</td>
            <td>" . $this->summary . "</td>
            <td>" . $this->release_date . "</td>
            <td>" . $this->category . "</td>
            <td><input type='checkbox' disabled" .( $this->for_child ? " checked/>" : "/>" ). "</td>
            <td><input type='checkbox' disabled" .( $this->available ? " checked/>" : "/>" ). "</td>
            <td>" . $this->client_id ?? "". "</td>
        </tr>";
    }
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
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getRelease_date(): string
    {
        return $this->release_date;
    }

    /**
     * @param string $release_date
     */
    public function setRelease_date(string $release_date): void
    {
        $this->release_date = $release_date;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return bool
     */
    public function getFor_child(): bool
    {
        return $this->for_child;
    }

    /**
     * @param bool $for_child
     */
    public function setFor_child(bool $for_child): void
    {
        $this->for_child = $for_child;
    }

    /**
     * @return bool
     */
    public function getAvailable(): bool
    {
        return $this->available;
    }

    /**
     * @param bool $available
     */
    public function setAvailable(bool $available): void
    {
        $this->available = $available;
    }

    /**
     * @return int
     */
    public function getClient_id(): ?int
    {
        return $this->client_id;
    }

    /**
     * @param int $client_id
     */
    public function setClient_id(?int $client_id): void
    {
        $this->client_id = $client_id;
    }
}
