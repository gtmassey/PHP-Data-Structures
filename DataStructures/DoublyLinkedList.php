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
 *      average()               Returns the average value of all nodes in the list
 *      median()                Returns the median value of all nodes in the list
 *      mode()                  Returns the mode value of all nodes in the list
 *      join($list)             Returns a new LinkedList with the nodes of both lists
 */
class DoublyLinkedList
{

    public Node|null $head;
    public Node|null $tail;

    /**
     * LinkedList default constructor
     */
    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
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
    public function delete($data): void
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
     * removes the last node from the list
     *
     * @return void
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
        $this->tail = $previous;
    }

    /**
     * removes the first node of the list
     * @return void
     */
    public function deleteFirst(): void
    {
        $this->head = $this->head->next;
        $this->head->prev = null;
    }

    /**
     * removes the node at a specific position in the linked list
     * throws an OutOfBoundsException if the position is out of bounds
     *
     * @param $position
     * @return void
     * @throws OutOfBoundsException
     */
    public function deleteAt($position): void
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

    /**
     * unlinks all nodes in the list
     *
     * @return void
     */
    public function clear(): void
    {
        $this->head = null;
    }

    /**
     * returns the node with the maximum $data value
     *
     * @return Node|null
     */
    public function max(): Node|null
    {
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

    /**
     * returns the node with the minimum $data value
     *
     * @return Node|null
     */
    public function min(): Node|null
    {
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

    /**
     * Returns a new DoublyLinkedList with duplicate values removed
     *
     * @return DoublyLinkedList
     */
    public function dedupe(): DoublyLinkedList
    {
        $deduped = new DoublyLinkedList();
        $current = $this->head;
        while ($current != null) {
            if (!$deduped->contains($current->data)) {
                $deduped->addLast($current->data);
            }
            $current = $current->next;
        }
        return $deduped;
    }

    /**
     * Returns a new DoublyLinkedList with only the unique nodes
     *
     * @return DoublyLinkedList
     */
    public function unique(): DoublyLinkedList
    {
        $unique = new DoublyLinkedList();
        $current = $this->head;
        $array = [];
        while ($current != null) {
            if (!in_array($current->data, $array)) {
                $unique->add($current->data);
                $array[] = $current->data;
            }
            $current = $current->next;
        }
        return $unique;
    }

    /**
     * Returns a new DoublyLinkedList with the nodes in reverse order
     *
     * @return DoublyLinkedList
     */
    public function reverse(): DoublyLinkedList
    {
        $reverse = new DoublyLinkedList();
        $current = $this->head;
        while ($current != null) {
            $reverse->addFirst($current->data);
            $current = $current->next;
        }
        return $reverse;
    }

    /**
     * returns true if the linked list contains the value
     * returns false if the linked list does not contain the value
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
     * @param  callable  $callback
     * @return DoublyLinkedList
     */
    public function forEach(callable $callback): DoublyLinkedList
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
     * Sorts the list in ascending order
     *
     * @return DoublyLinkedList
     */
    public function sortAsc(): DoublyLinkedList
    {
        $list = new DoublyLinkedList();
        $arr = $this->toArray();
        sort($arr);
        foreach($arr as $item) {
            $list->add($item);
        }
        return $list;
    }

    /**
     * Sorts the list in descending order
     *
     * @return DoublyLinkedList
     */
    public function sortDesc(): DoublyLinkedList
    {
        $list = new DoublyLinkedList();
        $arr = $this->toArray();
        rsort($arr);
        foreach($arr as $item) {
            $list->add($item);
        }
        return $list;
    }

    /**
     * Sorts the list using a custom callback function
     * returns the sorted list as a new DoublyLinkedList
     *
     * @param  callable  $callback
     * @return DoublyLinkedList
     */
    public function sort(callable $callback): DoublyLinkedList
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

    /**
     * Calculates the average of the data in the linked list
     * only if the data is numeric. If there is no numeric data
     * in the list, the method returns null
     *
     * @throws \Exception
     */
    public function average(): float|null
    {
        $current = $this->head;
        $sum = 0;
        $count = 0;
        while ($current != null) {
            if(is_numeric($current->data)) {
                $sum += $current->data;
                $count++;
                $current = $current->next;
            } else {
                $current = $current->next;
            }
        }
        if($count == 0) {
            return null;
        } else {
            return $sum / $count;
        }
    }

    /**
     * returns the median of the data in the linked list
     *
     * @return mixed
     */
    public function median(): mixed
    {
        $sorted = $this->sortAsc();
        $sorted = $sorted->toArray();
        $count = count($sorted);
        $middle = floor(($count - 1) / 2);
        return $sorted[$middle];
    }

    /**
     * returns the data that occurs the most in the list
     *
     * @return int|string|null
     */
    public function mode(): int|string|null
    {
        $current = $this->head;
        $array = [];
        while ($current != null) {
            $array[] = $current->data;
            $current = $current->next;
        }
        $values = array_count_values($array);
        arsort($values);
        return array_key_first($values);
    }

    /**
     * Joins two DoublyLinkedLists and returns the new list
     * with the second list added to the end of the first
     *
     * @param  DoublyLinkedList  $list
     * @return DoublyLinkedList
     */
    public function join(DoublyLinkedList $list): DoublyLinkedList
    {
        $joined = new DoublyLinkedList();
        $current = $this->head;
        while ($current != null) {
            $joined->add($current->data);
            $current = $current->next;
        }
        $current = $list->head;
        while ($current != null) {
            $joined->add($current->data);
            $current = $current->next;
        }
        return $joined;
    }
}
