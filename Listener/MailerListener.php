<?php

/**
 * This file is part of the pd-admin pd-activity package.
 *
 * @package     pd-activity
 * @license     LICENSE
 * @author      Ramazan APAYDIN <apaydin541@gmail.com>
 * @link        https://github.com/appaydin/pd-activity
 */

namespace Pd\ActivityBundle\Listener;

use Pd\ActivityBundle\Message\MailLog;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\Event\MessageEvent;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Mime\Email;

class MailerListener implements EventSubscriberInterface
{
    public function __construct(
        private ParameterBagInterface $bag,
        private MessageBusInterface $bus
    ) {
    }

    /**
     * Listen Send Mail.
     */
    public function onSendMail(MessageEvent $event): void
    {
        if (!$this->bag->get('pd_activity.log_mailer') || !$event->isQueued()) {
            return;
        }

        /** @var Email $email */
        $email = $event->getMessage();
        if ($event->getMessage() instanceof Email) {
            $this->bus->dispatch(new MailLog(
                $email->getTo(),
                $email->getFrom(),
                $email->getCc(),
                $email->getBcc(),
                $email->getSubject(),
                $email->getHtmlBody() ?? $email->getTextBody()
            ));
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [MessageEvent::class => 'onSendMail'];
    }
}
