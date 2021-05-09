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

class HttpLog implements ActivityLogMessage
{
    public function __construct(
        private string $requestMethod,
        private string $requestUri,
        private array $requestBody,
        private string $requestIp,
        private string $requestLocale,
        private ?int $userId
    ) {
    }

    public function getRequestMethod(): string
    {
        return $this->requestMethod;
    }

    public function getRequestUri(): string
    {
        return $this->requestUri;
    }

    public function getRequestBody(): array
    {
        return $this->requestBody;
    }

    public function getRequestIp(): string
    {
        return $this->requestIp;
    }

    public function getRequestLocale(): string
    {
        return $this->requestLocale;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }
}
