<?php

namespace App\Message;

use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface as TransportSerializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class PrepareResultSerializer
 * @package App\Message
 */
class PrepareResultSerializer implements TransportSerializer
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var LoggerInterface */
    private $logger;

    /**
     * PrepareResultSerializer constructor.
     * @param SerializerInterface $serializer
     * @param LoggerInterface $logger
     */
    public function __construct(SerializerInterface $serializer, LoggerInterface $logger)
    {
        $this->serializer = $serializer;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function decode(array $encodedEnvelope): Envelope
    {
        /** @var PrepareResultMessage $message */
        $message = $this->serializer->deserialize($encodedEnvelope['body'], PrepareResultMessage::class, 'json');

        $this->logger->info(sprintf(
            'Decode result message "%s"', $message->getContent()
        ));

        return new Envelope($message);
    }

    /**
     * @inheritDoc
     */
    public function encode(Envelope $envelope): array
    {
        throw new \Exception('Transport not support sending message');
    }
}