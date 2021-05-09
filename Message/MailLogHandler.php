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
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class MailLogHandler implements MessageHandlerInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function __invoke(MailLog $message)
    {
        $log = (new \Pd\ActivityBundle\Entity\MailLog())
            ->setMailFrom($message->getFrom())
            ->setMailTo($message->getTo())
            ->setMailCC($message->getCc())
            ->setMailBcc($message->getBcc())
            ->setMailSubject($message->getSubject())
            ->setMailBody($message->getBody());

        $this->entityManager->persist($log);
        $this->entityManager->flush();
    }
}
