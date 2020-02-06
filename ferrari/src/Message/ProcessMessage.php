<?php

namespace App\Message;

/**
 * Class ProcessMessage
 * @package App\Message
 */
class ProcessMessage
{
    /** @var string */
    public $content;

    /**
     * StartMessage constructor.
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