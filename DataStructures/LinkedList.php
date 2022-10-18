<?php

namespace DataStructures;

use OutOfBoundsException;

/**
 * Doubly Linked List
 *
 * @author  Garrett Massey
 * @license MIT
 * @link https://github.com/gtmassey/PHP-Data-Structures
 * @link http://www.garrettmassey.net/
 * @version 1.0
 *
 * Available Methods:
 *      add($data)              Adds a new node to the end of the list
 *      addAt($position, $data) Add a new node at the specified position
 *      addFirst($data)         Add a new node to the beginning of the list
 *      delete($data)           Deletes all nodes with the specified data
 *      deleteLast()            Delete the last node in the list
 *      deleteFirst()           Delete the first node in the list
 *      deleteAt($position)     Removes the node at the specified position
 *      length()                Returns the length of the list (number of nodes)
 *      get()                   Returns the head node of the list
 *      getAt($position)        Gets the node at a given position
 *      toArray()               Return an array of all nodes in the list
 *      clear()                 Removes all nodes from the list
 *      max()                   Returns the node with the max value
 *      min()                   Returns the node with the min value
 *      dedupe()                Returns a new LinkedList with no duplicate values
 *      unique()                Returns a new LinkedList with only the unique values
 *      reverse()               Returns a new list with the nodes in reverse order
 *      contains($data)         Checks if the LinkedList contains the $data
 *      forEach($callback)      Iterates over each node in the list with a callback
 *      sortAsc()               Returns a new LinkedList sorted in ascending order
 *      sortDesc()              Returns a new LinkedList sorted in descending order
 *      sort($callback)         Returns a new LinkedList sorted using a callback
 *
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
    public function delete($data): void
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
     * remove the last node from the list
     */
    public function deleteLast(): void
    {
        $current = $this->head;
        $previous = null;
        while ($current->next != null) {
            $previous = $current;
            $current = $current->next;
        }
        $previous->next = null;
    }

    /**
     * Remove the first node from the list
     *
     * @return void
     */
    public function deleteFirst(): void
    {
        $this->head = $this->head->next;
    }

    /**
     * Remove a node at a given position
     *
     * @param $position
     * @return void
     * @throws OutOfBoundsException
     */
    public function deleteAt($position): void
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

    /**
     * Clears all nodes from the list
     *
     * @return void
     */
    public function clear(): void
    {
        $this->head = null;
    }

    /**
     * Gets the max element from the linked list
     * If there are multiple nodes with the same max value,
     * the first node with the max value will be returned
     *
     * If the list is empty, null will be returned
     *
     * @return null|Node $max
     */
    public function max(): Node|null
    {
        if ($this->head == null) {
            return null;
        } else {
            $current = $this->head;
            $max = $current;
            while ($current != null) {
                if ($current->data > $max->data) {
                    $max = $current;
                }
                $current = $current->next;
            }
            return $max;
        }

    }

    /**
     * gets the min node from the list
     * if there are multiple nodes with the same min value,
     * the first node with the min value will be returned
     *
     * if there are no nodes in the list, the function will return null
     *
     * @return null|Node $min
     */
    public function min(): Node|null
    {
        if ($this->head == null) {
            return null;
        } else {
            $current = $this->head;
            $min = $current;
            while ($current != null) {
                if ($current->data < $min->data) {
                    $min = $current;
                }
                $current = $current->next;
            }
            return $min;
        }
    }

    /**
     * returns a new LinkedList with
     * duplicate values removed
     *
     * @return LinkedList $deduped
     */
    public function dedupe(): LinkedList
    {
        $deduped = new LinkedList();
        $current = $this->head;
        while ($current != null) {
            if (!$deduped->contains($current->data)) {
                $deduped->add($current->data);
            }
            $current = $current->next;
        }
        return $deduped;
    }

    /**
     * Returns a new LinkedList with only the unique values
     * of the original LinkedList
     *
     * @return LinkedList
     */
    public function unique(): LinkedList
    {
        $unique = new LinkedList();
        $current = $this->head;
        $values = [];
        while ($current != null) {
            if (!in_array($current->data, $values)) {
                $values[] = $current->data;
                $unique->add($current->data);
            }
            $current = $current->next;
        }
        return $unique;
    }

    /**
     * returns a new LinkedList that is the reverse of the $this LinkedList
     *
     * @return LinkedList
     */
    public function reverse(): LinkedList
    {
        $reversed = new LinkedList();
        $current = $this->head;
        while ($current != null) {
            $reversed->addFirst($current->data);
            $current = $current->next;
        }
        return $reversed;
    }

    /**
     * Checks if the list contains a given value
     *
     * @param $data
     * @return bool
     */
    public function contains($data): bool
    {
        $current = $this->head;
        while ($current != null) {
            if ($current->data == $data) {
                return true;
            }
            $current = $current->next;
        }
        return false;
    }

    /**
     * method that iterate through the list and runs
     * the given callback function on each element
     *
     * Returns a new LinkedList with the results of the callback
     *
     * @param  callable  $callback
     * @return LinkedList $this
     */
    public function forEach(callable $callback): LinkedList
    {
        $list = new LinkedList();
        $current = $this->head;
        while ($current != null) {
            $list->add($callback($current->data));
            $current = $current->next;
        }
        return $list;
    }

    /**
     * Returns a new LinkedList with ascending sorted data
     *
     * @return LinkedList
     */
    public function sortAsc(): LinkedList
    {
        $sorted = new LinkedList();
        $current = $this->head;
        $values = [];
        while ($current != null) {
            $values[] = $current->data;
            $current = $current->next;
        }
        sort($values);
        foreach ($values as $value) {
            $sorted->add($value);
        }
        return $sorted;
    }

    /**
     * Returns a new LinkedList with descending sorted data
     *
     * @return LinkedList
     */
    public function sortDesc(): LinkedList
    {
        $sorted = new LinkedList();
        $current = $this->head;
        $values = [];
        while ($current != null) {
            $values[] = $current->data;
            $current = $current->next;
        }
        rsort($values);
        foreach ($values as $value) {
            $sorted->add($value);
        }
        return $sorted;
    }

    /**
     * returns a new LinkedList with sorting as defined by the callback function
     *
     * @param  callable  $callback
     * @return LinkedList
     */
    public function sort(callable $callback): LinkedList
    {
        $sorted = new LinkedList();
        $current = $this->head;
        $values = [];
        while ($current != null) {
            $values[] = $current->data;
            $current = $current->next;
        }
        usort($values, $callback);
        foreach ($values as $value) {
            $sorted->add($value);
        }
        return $sorted;
    }

}
