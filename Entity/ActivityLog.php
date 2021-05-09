<?php

/**
 * This file is part of the pd-admin pd-activity package.
 *
 * @package     pd-activity
 * @license     LICENSE
 * @author      Ramazan APAYDIN <apaydin541@gmail.com>
 * @link        https://github.com/appaydin/pd-activity
 */

namespace Pd\ActivityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Pd\ActivityBundle\Repository\ActivityLogRepository;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ActivityLogRepository::class)
 */
class ActivityLog
{
    public const METHODS = [
        'GET' => 0,
        'POST' => 1,
        'PUT' => 2,
        'PATCH' => 3,
        'DELETE' => 4,
        'PURGE' => 5,
        'OPTIONS' => 6,
        'TRACE' => 7,
        'CONNECT' => 8,
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Choice(choices=ActivityLog::METHODS)
     */
    private $method;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uri;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $body;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $clientIp;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $locale;

    /**
     * @ORM\ManyToOne(targetEntity=UserInterface::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $owner;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMethod(): ?int
    {
        return $this->method;
    }

    public function setMethod(int $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getClientIp(): ?string
    {
        return $this->clientIp;
    }

    public function setClientIp(string $clientIp): self
    {
        $this->clientIp = $clientIp;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getOwner(): ?\Symfony\Component\Security\Core\User\UserInterface
    {
        return $this->owner;
    }

    public function setOwner(?\Symfony\Component\Security\Core\User\UserInterface $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
