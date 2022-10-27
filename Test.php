<?php

namespace DataStructures;

require('vendor/autoload.php');

//$queue = new Queue();
//
//$queue->enqueue("first");
//$queue->enqueue("second");
//$queue->enqueue("third");
//
//var_dump($queue->toString());
//
//$queue->dequeue();
//
//var_dump($queue->toString());
//
//$queue->enqueue("new data");
//
//var_dump($queue->toString());
//
//var_dump($queue->peek());
//var_dump($queue->peekNext());

//$stack = new Stack();
//$stack->push(1);
//$stack->push(2);
//$stack->push(3);
//var_dump($stack->toString());
//$stack->pop();
//var_dump($stack->toString());
//$stack->push("new data");
//var_dump($stack->toString());
//var_dump($stack->peek());
//var_dump($stack->peekNext());

$deck = new Deque();
$deck->addFirst("MiddleCard");
$deck->addFirst("TopCard");
$deck->addLast("BottomCard");
var_dump($deck->toString());
$deck->remove();
$deck->removeFirst();
var_dump($deck->toString());

/*
include('DataStructures/Node.php');
include('DataStructures/LinkedList.php');
include('DataStructures/DoublyLinkedList.php');

$list = new DataStructures\LinkedList();

var_dump(get_class_methods('DataStructures\LinkedList'));
*/
/**
$singleList = new DataStructures\LinkedList();
$singleList->add(1);
$singleList->add(2);
$singleList->add(3);
$singleList->add(4);
$singleList->add(5);
$singleList->add(6);

//[1, 2, 3, 4, 5, 6]
print_r($singleList->toArray());

$singleList->addFirst(0);

//[0, 1, 2, 3, 4, 5, 6]
print_r($singleList->toArray());

$singleList->delete(3);

//[0, 1, 2, 4, 5, 6]
print_r($singleList->toArray());

$singleList->deleteFirst();
$singleList->deleteAt(1);

//[1, 4, 5, 6]
print_r($singleList->toArray());

$doubleList = new DataStructures\DoublyLinkedList();

$doubleList->add('a');
$doubleList->add('b');
$doubleList->add('c');
$doubleList->add('d');
$doubleList->add('e');
$doubleList->add('f');

//[a, b, c, d, e, f]
print_r($doubleList->toArray());

$doubleList->addAt(0, 'z');

//[z, a, b, c, d, e, f]
print_r($doubleList->toArray());

$doubleList->deleteFirst();
$doubleList->deleteLast();
$doubleList->deleteAt(1);

//[a, c, d, e]
print_r($doubleList->toArray());

$doubleList->clear();
$doubleList->add('h');
$doubleList->add('e');
$doubleList->add('l');
$doubleList->add('l');
$doubleList->add('o');

//[h, e, l, l, o]
print_r($doubleList->toArray());

$val = $doubleList->getAt(2);
//l
var_dump($val->getData());
//e
var_dump($val->getPrev()->getData());
//l
var_dump($val->getNext()->getData());
//false
var_dump($val->isEnd());
//false
var_dump($val->isStart());


print_r($singleList->reverse()->toArray());

print_r($singleList->forEach(function ($data) {
    return $data * 2;
    })->toArray());

print_r($singleList->sort(function ($a) {
    return $a % 2;
})->toArray());

$singleList->clear();
//[]
print_r($singleList->toArray()); */