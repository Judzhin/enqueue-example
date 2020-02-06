<?php

namespace App\MessageHandler;

use App\Message\PrepareProcessMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class SecondMessageHandler
 * @package App\MessageHandler
 */
class SecondMessageHandler implements MessageHandlerInterface
{
    /** @var LoggerInterface */
    private $logger;

    /**
     * SecondMessageHandler constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param PrepareProcessMessage $message
     */
    public function __invoke(PrepareProcessMessage $message)
    {
        $this->logger->info('Get from ferrari.go[go]');
        /** @var string $content */
        $content = $message->getContent();



    }
}