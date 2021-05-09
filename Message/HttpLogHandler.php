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

use Doctrine\ORM\EntityManagerInterface;
use Pd\ActivityBundle\Entity\ActivityLog;
use Pd\ActivityBundle\Entity\UserInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class HttpLogHandler implements MessageHandlerInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function __invoke(HttpLog $message)
    {
        $user = $message->getUserId() ?
            $this->entityManager->getReference(UserInterface::class, $message->getUserId()) :
            null;

        $log = (new ActivityLog())
            ->setMethod(ActivityLog::METHODS[$message->getRequestMethod()])
            ->setUri($message->getRequestUri())
            ->setBody(serialize($message->getRequestBody()))
            ->setClientIp($message->getRequestIp())
            ->setLocale($message->getRequestLocale())
            ->setOwner($user);

        $this->entityManager->persist($log);
        $this->entityManager->flush();
    }
}
