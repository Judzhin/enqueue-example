<?php

namespace App\MessageHandler;

use App\Message\ProcessMessage;
use App\Message\ResultMessage;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class ProcessMessageHandler
 * @package App\MessageHandler
 */
class ProcessMessageHandler implements MessageHandlerInterface
{
    /** @var MessageBusInterface */
    private $commandBus;

    /**
     * PrepareProcessMessageHandler constructor.
     * @param MessageBusInterface $commandBus
     */
    public function __construct(MessageBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param ProcessMessage $message
     * @throws \Exception
     */
    public function __invoke(ProcessMessage $message): void
    {
        $this->commandBus->dispatch(new ResultMessage(sprintf(
            "%s\n Return to start handler at %s.", $message->getContent(), (new \DateTime)->format('d-m-Y')
        )));
    }
}