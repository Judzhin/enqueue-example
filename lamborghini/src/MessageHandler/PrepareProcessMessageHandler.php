<?php


namespace App\MessageHandler;


use App\Message\PrepareProcessMessage;
use App\Message\ProcessMessage;
use App\Message\ResultMessage;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class PrepareMessageHandler
 * @package App\MessageHandler
 */
class PrepareProcessMessageHandler implements MessageHandlerInterface
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
     * @param PrepareProcessMessage $message
     */
    public function __invoke(PrepareProcessMessage $message): void
    {
        // $this->commandBus->dispatch(new Envelope(new ResultMessage(
        //     $message->getContent() . "\n Return to start handler."
        // )));

        $this->commandBus->dispatch(new ResultMessage(
            $message->getContent() . "\n Return to start handler."
        ));

        // new ProcessMessage(
        //     $message->getContent() . "\n Move message to process."
        // )
    }
}