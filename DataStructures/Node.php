<?php

namespace DataStructures;

class Node
{
    public mixed $data;
    public Node|null $next;
    public Node|null $prev;

    public Node|null $left;
    public Node|null $right;
    public Node|null $parent;

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
     * returns the left child of the given node
     *
     * @return Node|null
     */
    public function getLeft(): Node|null
    {
        return $this->left;
    }

    /**
     * returns the right child of the given node
     *
     * @return Node|null
     */
    public function getRight(): Node|null
    {
        return $this->right;
    }

    /**
     * returns the parent of the given node
     *
     * @return Node|null
     */
    public function getParent(): Node|null
    {
        return $this->parent;
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
