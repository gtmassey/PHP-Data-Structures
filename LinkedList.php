<?php

/**
 * LinkedList
 */
class LinkedList
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
     * Add a new node with $data to the end of the list
     *
     * @param $data
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
        }
    }

    /**
     * Add a new node with $data at a specific position
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
        }
    }

    /**
     * Add a node with $data at the beginning of the list
     *
     * @param $data
     * @return void
     */
    public function addFirst($data): void
    {
        $node = new Node($data);
        if ($this->head != null) {
            $node->next = $this->head;
        }
        $this->head = $node;
    }

    /**
     * Remove the last node from the list
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
                } else {
                    $previous->next = $current->next;
                }
                return;
            }
            $previous = $current;
            $current = $current->next;
        }
    }

    /**
     * Remove a node at a given position
     *
     * @param $position
     * @return void
     * @throws OutOfBoundsException
     */
    public function removeAt($position): void
    {
        if ($position > $this->length() - 1 || $position < 0) {
            throw new OutOfBoundsException("$position is out of bounds");
        } else {
            $current = $this->head;
            $previous = null;
            $i = 0;
            while ($current != null) {
                if ($i == $position) {
                    if ($previous == null) {
                        $this->head = $current->next;
                    } else {
                        $previous->next = $current->next;
                    }
                    return;
                }
                $previous = $current;
                $current = $current->next;
                $i++;
            }
        }
    }

    /**
     * returns the length of the list as an int
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
     * Gets the head node of the list
     *
     * @return Node
     */
    public function get(): Node
    {
        return $this->head;
    }

    /**
     * returns the node at a given position
     *
     * @param $position
     * @return Node|null
     * @throws OutOfBoundsException
     */
    public function getAt($position): Node|null
    {
        if ($position > $this->length() - 1 || $position < 0) {
            throw new OutOfBoundsException("$position is out of bounds");
        } else {
            $current = $this->head;
            $i = 0;
            while ($current != null) {
                if ($i == $position) {
                    return $current;
                }
                $current = $current->next;
                $i++;
            }
            return null;
        }
    }

    /**
     * returns the linked list as a standard array
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
