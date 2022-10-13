<?php

include('DataStructures/Node.php');
include('DataStructures/LinkedList.php');


$singleList = new DataStructures\LinkedList();
$singleList->add(1);
$singleList->add(2);
$singleList->add(3);
$singleList->add(4);
$singleList->add(5);
$singleList->add(6);

$array = $singleList->toArray();
var_dump($array);
