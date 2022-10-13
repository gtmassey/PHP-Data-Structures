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

    public function getData()
    {
        return $this->data;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function getPrev()
    {
        return $this->prev;
    }

    public function isEnd()
    {
        return $this->next === null;
    }

    public function isStart()
    {
        return $this->prev === null;
    }
}
