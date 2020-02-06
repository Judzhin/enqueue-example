<?php

namespace App\Message;

use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Stamp\BusNameStamp;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface as TransportSerializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class PrepareProcessSerializer
 * @package App\Message
 */
class PrepareProcessSerializer implements TransportSerializer
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var LoggerInterface */
    private $logger;

    /**
     * PrepareProcessSerializer constructor.
     *
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
     *
     * @param array $encodedEnvelope
     * @return Envelope
     */
    public function decode(array $encodedEnvelope): Envelope
    {
        /** @var PrepareProcessMessage $message */
        $message = $this->serializer->deserialize($encodedEnvelope['body'], PrepareProcessMessage::class, 'json');

        $this->logger->info(sprintf(
            'Decode process message "%s"', $message->getContent()
        ));

        /** @var Envelope $envelope */
        $envelope = (new Envelope($message));
        $envelope->with(new BusNameStamp('process.bus'));

        return $envelope;
    }

    /**
     * @inheritDoc
     *
     * @param Envelope $envelope
     * @return array
     * @throws \Exception
     */
    public function encode(Envelope $envelope): array
    {
        throw new \Exception('Transport not support sending message');
    }
}