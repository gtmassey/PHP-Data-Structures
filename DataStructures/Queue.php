<?php

namespace DataStructures;

class Queue extends GenericList
{

    public Node|null $front;
    public Node|null $back;

    public function __construct()
    {
        parent::__construct();
        $this->front = $this->head;
        $this->back = $this->tail;
    }

    /**
     * adds data to the back of the queue
     *
     * @param $data
     * @return void
     */
    public function enqueue($data): void
    {
        $this->add($data);
        $this->back = $this->tail;
    }

    /**
     * returns the data of the front node of the queue
     *
     * @return mixed
     */
    public function dequeue(): mixed
    {
        return $this->removeHead();
    }

    /**
     * returns the data of the front node of the queue
     * does NOT remove the node
     *
     * @return mixed
     */
    public function peek(): mixed
    {
        return $this->front->data;
    }

    /**
     * returns the data of the next node in the queue
     * does NOT remove the node
     *
     * @return mixed
     */
    public function peekNext(): mixed
    {
        return $this->front->next->data;
    }
}