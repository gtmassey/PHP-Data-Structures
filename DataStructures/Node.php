<?php

namespace DataStructures;

class Node
{
    public $data;
    public $next;
    public $prev;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }

    /**
     * returns the data of the given node
     *
     * @return mixed
     */
    public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * returns the next node
     *
     * @return Node|null
     */
    public function getNext(): ?Node
    {
        return $this->next;
    }

    /**
     * returns the previous node
     *
     * @return Node|null
     */
    public function getPrev(): ?Node
    {
        return $this->prev;
    }

    /**
     * returns true if the node is the end of a list
     *
     * @return bool
     */
    public function isEnd(): bool
    {
        return $this->next === null;
    }

    /**
     * returns true if the node is the start of a list
     *
     * @return bool
     */
    public function isStart(): bool
    {
        return $this->prev === null;
    }
}
