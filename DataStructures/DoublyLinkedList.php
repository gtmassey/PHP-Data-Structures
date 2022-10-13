<?php

namespace DataStructures;

/**
 * DoublyLinkedList
 */
class DoublyLinkedList
{

    public Node|null $head;

    /**
     * LinkedList default constructor
     */
    public function __construct()
    {
        $this->head = null;
    }

    /**
     * add a new node to the doubly linked list
     *
     * @param $data
     * @return void
     */
    public function add($data): void
    {
        $node = new Node($data);
        if ($this->head == null) {
            $this->head = $node;
        } else {
            $current = $this->head;
            while ($current->next != null) {
                $current = $current->next;
            }
            $current->next = $node;
            $node->prev = $current;
        }
    }

    /**
     * add a new node at a specific position
     *
     * @param $position
     * @param $data
     * @return void
     */
    public function addAt($position, $data): void
    {
        $node = new Node($data);
        $current = $this->head;
        $previous = null;
        $i = 0;
        if ($position == 0) {
            $node->next = $this->head;
            $this->head = $node;
        } else {
            while ($i < $position) {
                $i++;
                $previous = $current;
                $current = $current->next;
            }
            $node->next = $current;
            $previous->next = $node;
            $node->prev = $previous;
            $current->prev = $node;
        }
    }

    /**
     * Adds a new node to the beginning of the list
     *
     * @param $data
     * @return void
     */
    public function addFirst($data): void
    {
        $node = new Node($data);
        if ($this->head != null) {
            $node->next = $this->head;
            $this->head->prev = $node;
        }
        $this->head = $node;
    }

    /**
     * Removes any node(s) with the given data from the list
     *
     * @param $data
     * @return void
     */
    public function remove($data): void
    {
        $current = $this->head;
        $previous = null;
        while ($current != null) {
            if ($current->data == $data) {
                if ($previous == null) {
                    $this->head = $current->next;
                    $this->head->prev = null;
                } else {
                    $previous->next = $current->next;
                    $current->next->prev = $previous;
                }
                return;
            }
            $previous = $current;
            $current = $current->next;
        }
    }

    /**
     * removes the node at a specific position in the linked list
     * throws an OutOfBoundsException if the position is out of bounds
     *
     * @param $position
     * @return void
     * @throws OutOfBoundsException
     */
    public function removeAt($position): void
    {
        if ($position > ($this->length() - 1) || $position < 0) {
            throw new OutOfBoundsException("$position is out of bounds");
        } else {
            $current = $this->head;
            $previous = null;
            $i = 0;
            while ($current != null) {
                if ($i == $position) {
                    if ($previous == null) {
                        $this->head = $current->next;
                        $this->head->prev = null;
                    } else {
                        $previous->next = $current->next;
                        $current->next->prev = $previous;
                    }
                }
                $previous = $current;
                $current = $current->next;
                $i++;
            }
        }
    }

    /**
     * returns the size of the linked list as an int
     *
     * @return int
     */
    public function length(): int
    {
        $current = $this->head;
        $length = 0;
        while ($current != null) {
            $length++;
            $current = $current->next;
        }
        return $length;
    }

    /**
     * returns the head node of the linked list
     *
     * @return Node
     */
    public function get(): Node
    {
        return $this->head;
    }

    /**
     * returns the node at a specific position in the linked list
     * returns null if the node is empty
     * throws an OutOfBoundsException if the position is out of bounds
     *
     * @param $position
     * @return Node|null
     * @throws OutOfBoundsException
     */
    public function getAt($position): Node|null
    {
        if ($position > ($this->length() - 1) || $position < 0) {
            throw new OutOfBoundsException("$position is out of bounds");
        } else {
            $current = $this->head;
            $i = 0;
            while ($current != null) {
                if ($i == $position) {
                    return $current;
                }
                $i++;
                $current = $current->next;
            }
            return null;
        }
    }

    /**
     * Converts the data in the linked list to an array
     *
     * @return array
     */
    public function toArray(): array
    {
        $array = [];
        $current = $this->head;
        while ($current != null) {
            $array[] = $current->data;
            $current = $current->next;
        }
        return $array;
    }

}
