<?php

namespace DataStructures;

class Deque extends GenericList
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * adds a new node to the beginning of the list
     *
     * @param $data
     * @return void
     */
    public function addFirst($data): void
    {
        $this->addHead($data);
    }

    /**
     * adds a new node to the end of the list
     *
     * @param $data
     * @return void
     */
    public function addLast($data): void
    {
        $this->add($data);
    }

    /**
     * removes the last node of the list
     * returns the data of the last node
     *
     * @return mixed
     */
    public function removeLast(): mixed
    {
        return $this->remove();
    }

    /**
     * removes the first node of the list
     * returns the data of the first node
     *
     * @return mixed
     */
    public function removeFirst(): mixed
    {
        return $this->removeHead();
    }

    /**
     * returns the data of the first node of the list
     *
     * @return mixed
     */
    public function peekFirst(): mixed
    {
        return $this->head->data;
    }

    /**
     * returns the data of the last node in the list
     *
     * @return mixed
     */
    public function peekLast(): mixed
    {
        return $this->tail->data;
    }

    /**
     * returns the data of the second node in the list
     *
     * @return mixed
     */
    public function peekNext(): mixed
    {
        return $this->head->next->data;
    }

    /**
     * returns the data of the second to last node in the list
     *
     * @return mixed
     */
    public function peekPrev(): mixed
    {
        return $this->tail->prev->data;
    }

}