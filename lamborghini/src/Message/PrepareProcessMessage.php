<?php

namespace App\Message;

/**
 * Class PrepareProcessMessage
 * @package App\Message
 */
class PrepareProcessMessage
{
    /** @var string */
    private $content;

    /**
     * PrepareProcessMessage constructor.
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