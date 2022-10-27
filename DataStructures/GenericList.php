<?php

namespace DataStructures;

class GenericList
{

    public Node|null $head;
    public Node|null $tail;
    public int $length;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->length = 0;
    }

    /**
     * returns the first node of the list
     * null if the list is empty
     *
     * @return Node|null
     */
    public function getHead(): Node|null
    {
        return $this->head;
    }

    /**
     * returns the last node of the list, null if empty
     *
     * @return Node|null
     */
    public function getTail(): Node|null
    {
        return $this->tail;
    }

    /**
     * returns the length (size) of the list
     *
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * adds data to the end of the list
     *
     * @param $data
     * @return void
     */
    public function add($data): void
    {
        $node = new Node($data);
        if ($this->head === null) {
            $this->head = $node;
            $this->tail = $node;
        } else {
            $this->tail->next = $node;
            $node->prev = $this->tail;
            $this->tail = $node;
        }
        $this->length++;
    }

    public function addHead($data): void
    {
        $node = new Node($data);
        if ($this->head === null) {
            $this->head = $node;
            $this->tail = $node;
        } else {
            $node->next = $this->head;
            $this->head->prev = $node;
            $this->head = $node;
        }
        $this->length++;
    }

    /**
     * removes the node at the END of the list
     * returns the data of the deleted node
     *
     * @return mixed
     */
    public function remove(): mixed
    {
        if ($this->head === null) {
            return null;
        }
        $data = $this->tail->data;
        if ($this->head === $this->tail) {
            $this->head = null;
            $this->tail = null;
        } else {
            $this->tail = $this->tail->prev;
            $this->tail->next = null;
        }
        $this->length--;
        return $data;
    }

    /**
     * removes the node at the BEGINNING of the list
     * returns the data of the deleted node
     *
     * @return mixed
     */
    public function removeHead(): mixed
    {
        if ($this->head === null) {
            return null;
        }
        $data = $this->head->data;
        if ($this->head === $this->tail) {
            $this->head = null;
            $this->tail = null;
        } else {
            $this->head = $this->head->next;
            $this->head->prev = null;
        }
        $this->length--;
        return $data;
    }

    /**
     * removes the node at the given index
     * returns the data of the deleted node
     *
     * @param $position
     * @return void
     */
    public function removeAt($position)
    {
        if ($position < 0 || $position >= $this->length) {
            return null;
        }
        if ($position === 0) {
            return $this->removeHead();
        }
        if ($position === $this->length - 1) {
            return $this->remove();
        }
        $current = $this->head;
        $index = 0;
        while ($index !== $position) {
            $current = $current->next;
            $index++;
        }
        $current->prev->next = $current->next;
        $current->next->prev = $current->prev;
        $this->length--;
        return $current->data;
    }

    /**
     * returns the data of the node at the given index
     *
     * @param $position
     * @return mixed
     */
    public function getAt($position): mixed
    {
        if ($position < 0 || $position >= $this->length) {
            return null;
        }
        $current = $this->head;
        $index = 0;
        while ($index !== $position) {
            $current = $current->next;
            $index++;
        }
        return $current->data;
    }

    /**
     * returns the index of the fist instance of the given data
     *
     * @param $data
     * @return int
     */
    public function indexOf($data): int
    {
        $current = $this->head;
        $index = 0;
        while ($current !== null) {
            if ($current->data === $data) {
                return $index;
            }
            $current = $current->next;
            $index++;
        }
        return -1;
    }

    /**
     * returns the index of the last instance of the given data
     *
     * @param $data
     * @return int
     */
    public function lastIndexOf($data): int
    {
        $current = $this->tail;
        $index = $this->length - 1;
        while ($current !== null) {
            if ($current->data === $data) {
                return $index;
            }
            $current = $current->prev;
            $index--;
        }
        return -1;
    }

    /**
     * returns true if the list contains the given data
     *
     * @param $data
     * @return bool
     */
    public function contains($data): bool
    {
        return $this->indexOf($data) !== -1;
    }

    /**
     * returns true if the list is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->length === 0;
    }

    /**
     * empties the list
     *
     * @return void
     */
    public function clear(): void
    {
        $this->head = null;
        $this->tail = null;
        $this->length = 0;
    }

    public function toArray(): array
    {
        $array = [];
        $current = $this->head;
        while ($current !== null) {
            $array[] = $current->data;
            $current = $current->next;
        }
        return $array;
    }

    public function toString(): string
    {
        //recursively iterate through the list and return a string representation
        $string = '';
        $current = $this->head;
        while ($current !== null) {
            $string .= $current->data . '|';
            $current = $current->next;
        }

        return $string;
    }
}