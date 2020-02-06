<?php

namespace App\Message;

/**
 * Class ResultMessage
 * @package App\Message
 */
class ResultMessage
{
    /** @var string */
    private $content;

    /**
     * ResultMessage constructor.
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