<?php

namespace App\MessageHandler;

use App\Message\PrepareResultMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class PrepareResultMessageHandler
 * @package App\MessageHandler
 */
class PrepareResultMessageHandler implements MessageHandlerInterface
{
    /** @var LoggerInterface */
    private $logger;

    /**
     * PrepareResultMessageHandler constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param PrepareResultMessage $message
     */
    public function __invoke(PrepareResultMessage $message)
    {
        echo $message->getContent() . "\n";
        // $this->logger->info($message->getContent());
    }
}