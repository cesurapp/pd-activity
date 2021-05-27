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
use Pd\ActivityBundle\Repository\MailLogRepository;
use Symfony\Component\Mime\Address;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=MailLogRepository::class)
 */
class MailLog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="simple_array")
     */
    private $mailTo = [];

    /**
     * @ORM\Column(type="simple_array")
     */
    private $mailFrom = [];

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     */
    private $mailCC = [];

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     */
    private $mailBcc = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $mailSubject;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $mailBody;

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

    public function getMailTo(): ?array
    {
        return Address::createArray($this->mailTo);
    }

    public function getMailToArray(): ?array
    {
        return $this->mailTo;
    }

    public function setMailTo(array $mailTo): self
    {
        $this->mailTo = $this->addressToString($mailTo);

        return $this;
    }

    public function getMailFrom(): ?array
    {
        return Address::createArray($this->mailFrom);
    }

    public function getMailFromArray(): ?array
    {
        return $this->mailFrom;
    }

    public function setMailFrom(array $mailFrom): self
    {
        $this->mailFrom = $this->addressToString($mailFrom);

        return $this;
    }

    public function getMailCC(): ?array
    {
        return Address::createArray($this->mailCC);
    }

    public function getMailCCArray(): ?array
    {
        return $this->mailCC;
    }

    public function setMailCC(?array $mailCC): self
    {
        $this->mailCC = $this->addressToString($mailCC);

        return $this;
    }

    public function getMailBcc(): ?array
    {
        return Address::createArray($this->mailBcc);
    }

    public function getMailBccArray(): ?array
    {
        return $this->mailBcc;
    }

    public function setMailBcc(?array $mailBcc): self
    {
        $this->mailBcc = $this->addressToString($mailBcc);

        return $this;
    }

    public function getMailSubject(): ?string
    {
        return $this->mailSubject;
    }

    public function setMailSubject(?string $mailSubject): self
    {
        $this->mailSubject = $mailSubject;

        return $this;
    }

    public function getMailBody(): ?string
    {
        return $this->mailBody;
    }

    public function setMailBody(?string $body): self
    {
        $this->mailBody = $body;

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

    private function addressToString(?array $addresses): array
    {
        $converted = [];
        foreach ($addresses as $address) {
            if ($address instanceof Address) {
                $converted[] = $address->toString();
            } else {
                $converted[] = $address;
            }
        }

        return $converted;
    }
}
