<?php

namespace App\Messenger\FirstMessage;

/**
 * Class Message
 * @package App\Messenger\FirstMessage
 */
class Message
{
    /** @var string */
    private $content;

    /**
     * Message constructor.
     *
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}