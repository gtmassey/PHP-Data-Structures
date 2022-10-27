<?php

namespace DataStructures;

class Stack extends GenericList
{

    public Node|null $top;
    public Node|null $bottom;

    public function __construct()
    {
        parent::__construct();
        $this->top = $this->tail;
        $this->bottom = $this->head;
    }

    /**
     * adds data to the top of the stack
     *
     * @param $data
     * @return void
     */
    public function push($data): void
    {
        $this->add($data);
        $this->top = $this->tail;
    }

    /**
     * returns the data of the top node of the stack
     *
     * @return mixed
     */
    public function pop(): mixed
    {
        return $this->remove();
    }

    /**
     * returns the data of the top node of the stack
     * does NOT remove the node
     *
     * @return mixed
     */
    public function peek(): mixed
    {
        return $this->top->data;
    }

    /**
     * returns the data of the second to top node in the stack
     * does NOT remove the node
     *
     * @return mixed
     */
    public function peekNext(): mixed
    {
        return $this->top->prev->data;
    }
}