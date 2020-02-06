<?php

namespace App\Message;

/**
 * Class ProcessMessage
 * @package App\Message
 */
final class ProcessMessage
{
    /** @var string */
    private $content;

    /**
     * ProcessMessage constructor.
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