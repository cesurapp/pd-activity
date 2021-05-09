<?php

/**
 * This file is part of the pd-admin pd-activity package.
 *
 * @package     pd-activity
 * @license     LICENSE
 * @author      Ramazan APAYDIN <apaydin541@gmail.com>
 * @link        https://github.com/appaydin/pd-activity
 */

namespace Pd\ActivityBundle\Message;

use Symfony\Component\Mime\Address;

class MailLog implements ActivityLogMessage
{
    public function __construct(
        private array $to,
        private array $from,
        private array $cc,
        private array $bcc,
        private ?string $subject,
        private ?string $body
    ) {
    }

    /**
     * @return Address[]
     */
    public function getTo(): array
    {
        return $this->to;
    }

    /**
     * @return Address[]
     */
    public function getFrom(): array
    {
        return $this->from;
    }

    /**
     * @return Address[]
     */
    public function getCc(): array
    {
        return $this->cc;
    }

    /**
     * @return Address[]
     */
    public function getBcc(): array
    {
        return $this->bcc;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }
}
