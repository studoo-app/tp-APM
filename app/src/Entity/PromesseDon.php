<?php

namespace Apps\Entity;

class PromesseDon
{
    private ?int $id;

    private ?string $email;
    private ?string $firstname;
    private ?string $lastname;
    private ?int $amount;
    private \DateTime $createdAt;
    private ?\DateTime $honoredAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     */
    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     */
    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime|null
     */
    public function getHonoredAt(): ?\DateTime
    {
        return $this->honoredAt;
    }

    /**
     * @param \DateTime|null $honoredAt
     */
    public function setHonoredAt(?\DateTime $honoredAt): void
    {
        $this->honoredAt = $honoredAt;
    }

    public function toArray(): array
    {
        $array = get_object_vars($this);
        $array["createdAt"] = $array["createdAt"]->format('Y-m-d H:i:s');
        return $array;
    }

}
