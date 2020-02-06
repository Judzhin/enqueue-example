<?php

namespace App\Message;

/**
 * Class PrepareResultMessage
 * @package App\Message
 */
class PrepareResultMessage
{
    /** @var string */
    public $content;

    /**
     * PrepareResultMessage constructor.
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