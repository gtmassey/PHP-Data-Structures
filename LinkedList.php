<?php

/**
 * LinkedList
 */
class LinkedList {

	public $head;

	/**
	 * LinkedList default constructor
	 *
	 * @param $data
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
	public function add($data)
	{
		$node = new Node($data);
		if($this->head == null) {
			$this->head = $node;
		} else {
			$current = $this->head;
			while($current->next != null) {
				$current = $current->next;
			}
			$current->next = $node;
		}
	}

	public function addAt($position, $data) {
		$node = new Node($data);
		$current = $this->head;
		$previous = null;
		$i = 0;
		if($position == 0) {
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

	public function addFirst($data) {
		$node = new Node($data);
		if($this->head != null) {
			$node->next = $this->head;
		}
		$this->head = $node;
	}

	public function remove($data)
	{
		$current = $this->head;
		$previous = null;
		while($current != null) {
			if($current->data == $data) {
				if($previous == null) {
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

	public function removeAt($position)
	{
		$current = $this->head;
		$previous = null;
		$i = 0;
		while($current != null) {
			if($i == $position) {
				if($previous == null) {
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

	public function length()
	{
		$current = $this->head;
		$length = 0;
		while($current != null) {
			$length++;
			$current = $current->next;
		}
		return $length;
	}

	public function get()
	{
		return $this->head;
	}

	public function getAt($position)
	{
		$current = $this->head;
		$i = 0;
		while($current != null) {
			if($i == $position) {
				return $current;
			}
			$i++;
			$current = $current->next;
		}
		return null;
	}

	public function toArray()
	{
		$array = [];
		$current = $this->head;
		while($current != null) {
			$array[] = $current->data;
			$current = $current->next;
		}
		return $array;
	}

}
